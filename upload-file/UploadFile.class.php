<?php
  /**
   * 单文件上传
   */
  // 单文件上传
  class UploadFile {

    /**
     * 构造函数
     * @param [File] $file 文件对象
     */
    function __construct($file) {
      $this->upload_status = '';
      $this->upload_message = '';
      $this->file = $file;
      $this->mime_map = array(
        '.jpeg' => array('image/jpeg', 'image/pjpeg'),
        '.jpg' => array('image/jpeg', 'image/pjpeg'),
        '.png' => array('image/png', 'image/x-png'),
        '.gif' => array('image/gif')
      );
      $this->allow_ext_list = array('.jpeg', '.jpg', '.png', '.gif');
      $this->upload_path = './upload/';

      $this->checkFileParam();
      $this->checkFileError();
      $this->checkFileType();
      $this->uploadStart();
    }

    /**
     * 验证是否传入了正确的文件对象
     * 必须包含[name, type, size, error, tmp_name]
     */
    private function checkFileParam() {
      if ($this->upload_status === 'error') return;

      $file = $this->file;
      $right_name = gettype($file['name']) === 'string';
      $right_type = gettype($file['type']) === 'string';
      $right_tmp_name = gettype($file['tmp_name']) === 'string';
      $right_error = gettype($file['error']) === 'integer';
      $right_size = gettype($file['size']) === 'integer';
      if (!$right_name || !$right_type || !$right_tmp_name || !$right_error || !$right_size) {
        $this->upload_message = '传入的文件对象参数不合法！';
        $this->upload_status = 'error';
      }
    }

    // 检查文件对象接收的错误信息
    private function checkFileError() {
      if ($this->upload_status === 'error') return;

      $error = $this->file['error'];

      if ($error == 0) return;

      switch ($error) {
        case 1:
          $upload_message = '上传的文件超过了php.ini 中 upload_max_filesize 选项限制的值!';
          break;
        case 2:
          $upload_message = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值!';
          break;
        case 3:
          $upload_message = '文件只有部分被上传！';
          break;
        case 4:
          $upload_message = '没有文件被上传！';
          break;
        case 6:
          $upload_message = '找不到临时文件夹！';
          break;
        case 7:
          $upload_message = '文件写入失败！';
          break;
        default:
          $upload_message = '未知错误!';
          break;
      }
      $this->upload_status = 'error';
      $this->upload_message = $upload_message;
    }

    // 检查上传的文件 MIME 类型是否合法
    private function checkFileType() {
      if ($this->upload_status === 'error') return;

      $type = $this->file['type'];
      $name = $this->file['name'];
      $tmp_name = $this->file['tmp_name'];
      $allow_ext_list = $this->allow_ext_list;
      $mime_map = $this->mime_map;

      // 后缀检查
      $ext_name = strtolower(strrchr($name, '.'));
      if (!in_array($ext_name, $allow_ext_list)) {
        $this->upload_status = 'error';
        $this->upload_message = '上传的文件类型不合法！';
        return;
      }

      // 浏览器提供信息坚持
      $allow_mime_list = array();
      foreach($allow_ext_list as $val) {
        $allow_mime_list = array_merge($allow_mime_list, $mime_map[$val]);
      }
      $allow_mime_list = array_unique($allow_mime_list);
      if (!in_array($type, $allow_mime_list)) {
        $this->upload_status = 'error';
        $this->upload_message = '上传的文件类型不合法！';
        return;
      }

      // php自身检查
      // 需要开启 extension=fileinfo
      $file_mime = new Finfo(FILEINFO_MIME_TYPE);
      $mime = $file_mime->file($tmp_name);
      if (!in_array($mime, $allow_mime_list)) {
        $this->upload_status = 'error';
        $this->upload_message = '上传的文件类型不合法！';
        return;
      }
    }

    // 文件上传
    private function uploadStart() {
      if ($this->upload_status === 'error') return;

      $name = $this->file['name'];
      $tmp_name = $this->file['tmp_name'];
      $ext_name = strtolower(strrchr($name, '.'));
      $base_name = 'UPLOAD_' . md5(uniqid());
      $upload_path = $this->upload_path;

      // 上传路径检查
      if (!is_dir($upload_path)) {
        mkdir($upload_path);
      }

      // is_uploaded_file($file) 检查指定的文件是否是通过 HTTP POST 上传的
      // 如果文件是通过 HTTP POST 上传的，该函数返回 TRUE。
      if (is_uploaded_file($tmp_name)) {

        // move_uploaded_file($file, $path) 函数将上传的文件移动到新位置。
        // 若成功，则返回 true，否则返回 false。
        if (move_uploaded_file($tmp_name, $upload_path . $base_name . $ext_name)) {
          $this->upload_status = 'success';
          $this->upload_message = '文件上传成功！';
          return ;
        } else {
          // 需要写入权限
          $this->upload_message = '无法移动文件到指定位置！';
        }
      } else {
        $this->upload_message = '文件必须通过 HTTP POST 方式上传！';
      }
      $this->upload_status = 'error';
    }
  }
?>

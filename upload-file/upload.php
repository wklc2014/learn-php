<?php
  header('Content-Type:application/json');
  include 'UploadFile.class.php';

  $files = $_FILES['my_file'];

  $uploadFile = new UploadFile($files);

  // var_dump($uploadFile);

  $response = array(
    'status'=> $uploadFile->upload_status,
    'message'=> $uploadFile->upload_message,
  );

  // $length = count($files['name']);
  // for($i = 0; $i < $length; $i++) {
  //   $file = array(
  //     'name' => $files['name'][$i],
  //     'error' => $files['error'][$i],
  //     'type' => $files['type'][$i],
  //     'size' => $files['size'][$i],
  //     'tmp_name' => $files['tmp_name'][$i],
  //   );

  //   $response['status'] = $uploadFile->upload_status;
  //   $response['message'] = $uploadFile->upload_message;
  //   // print_r($uploadFile);
  //   if ($uploadFile->upload_status === 'error') {
  //     break;
  //   }
  // }

  // print_r($response);
  echo json_encode($response);
?>

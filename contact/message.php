<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "noxredstone@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Név: $name\nEmail: $email\nTelefonszám: $phone\nÜzenet: \n$message\n\nÜdvözlettel,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Az üzenet sikeresen elküldve. Hamarosan felvesszük veled a kapcsolatot!";
      }else{
         echo "Sajnálom, valami hiba történt a küldés során. Kérlek próbáld újra!";
      }
    }else{
      echo "Írj be valós email címet!";
    }
  }else{
    echo "Email és az Üzenet mező kitöltése kötelező!";
  }
?>

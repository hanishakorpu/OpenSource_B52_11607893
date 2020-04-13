
<?php include('form_process.php'); ?>

<link rel="stylesheet" href="form.css" type="text/css">

<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Hotel Qube</h3><br>
    <fieldset>
      <input placeholder="Enter your name" type="text" tabindex="1" autofocus name="name" value="<?= $name ?>">
      <span class="error"> <?= $name_error ?> </span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" name="email" value="<?= $email ?>">
      <span class="error"> <?= $email_error ?> </span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="tel" tabindex="3" name="phone" value="<?= $phone ?>">
      <span class="error"> <?= $phone_error ?> </span>
    </fieldset>
    <fieldset>
      <input type="radio" tabindex = "4" id="male" name="gender" checked="checked" value="Male"/>
      <label for="male"> Male </label>
      <input type="radio" id="female" name="gender" value="Female">
      <label for="female">Female</label>
      <input type="radio" id="other" name="gender" value="Other">
      <label for="other">Other</label><br>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>

    <div class="success"> <?= $success; ?> </div>
  </form>
 
  
</div>

<!DOCTYPE HTML>
<html>
<head>
    <title>PHP FORM</title>
    <style>
        body 
        {
            background-image: url('sathyabama.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .form-container 
        {
            background-color: #000;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <center class="form-container">
        <h1><b>SATHYABAMA</b></h1>
        <h2><b>INSTITUTE OF SCIENCE AND TECHNOLOGY</b></h2>
        <h3><b>[REGISTRATION FORM]</b></h3>
    </center>
    <br><br>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h1>Thank you for registering <?php echo htmlspecialchars($_POST['fname']); ?>!</h1>
        <h4>You have been recorded as <?php echo htmlspecialchars($_POST['fname']) . ' ' . htmlspecialchars($_POST['lname']); ?></h4>
        <p>
            First Name: <?php echo htmlspecialchars($_POST['fname']); ?><br><br>
            Last Name: <?php echo htmlspecialchars($_POST['lname']); ?><br><br>
            E-mail Id: <?php echo htmlspecialchars($_POST['email']); ?><br><br>
            Gender: <?php echo htmlspecialchars($_POST['gender']); ?><br><br>
            Phone Number: <?php echo htmlspecialchars($_POST['phno']); ?>
        </p>
    <?php else: ?>
        <form action="" method="POST" style="text-align: center;">
            First Name: <input type="text" name="fname" required><br><br>
            Last Name: <input type="text" name="lname" required><br><br>
            E-mail Id: <input type="email" name="email" required><br><br>
            Gender:
            <input type="radio" name="gender" value="male" required> Male
            <input type="radio" name="gender" value="female" required> Female<br><br>
            Phone Number: <input type="text" name="phno" maxlength="10" required><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>
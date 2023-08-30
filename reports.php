<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Main Form</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body background="pics/new.jpg">
    <a href="index.php"><img src="pics/home.png" alt="home" style="width:50px;height:50px;"></a>
    <a href="logout.php"><img src="pics/logout2.png" alt="home" style="width:80px;height:50px;" align="right"></a>
<h1>YF03 YELLOW FEVER VACCINE STUDY</h1>
<form class="col1" method="POST" action="export_adults.php">
<input type="submit" name="export" value="ADULT">
</form>
<form class="col3" method="POST" action="export_children.php">
<input type="submit" name="export" value="CHILDREN">
</form>
<form class="col3" method="POST" action="export_contacts.php">
<input type="submit" name="export" value="CONTACT DETAILS">
</form>
<form class="col3" method="POST" action="export_enrolled.php">
<input type="submit" name="export" value="ENROLMENT STATUS">
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Register Page</h1>

    <form class=""  action="home.php"  method="post">
        <button type="submit" name="home">Home</button>
    </form>

<form method="post">
      <select class="" name="">
        <option>Patient</option>
        <option>Doctor</option>
        <option>Family Memember</option>
        <option>Supervisor</option>
        <option>Caregiver</option>
      </select>

      <div>
        <label class="tb">First Name</label>
        <input class="tb" type="text" name="fName">
      </div>
      <div>
        <label>Last Name</label>
        <input type="text" name="lName">
      </div>
      <div>
        <label>Email</label>
        <input type="text" name="email">
      </div>
      <div>
        <label>Phone</label>
        <input type="text" name="s_col3">
      </div>
      <div>
        <label>Password</label>
        <input type="text" name="">
      </div>
      <div>
        <label>Date of Birth</label>
        <input type="text" name="dob">
      </div>
      <div>
        <label>Family Code</label>
        <input type="text" name="fc">
      </div>
      <div>
        <label>Emergency Contact</label>
        <input type="text" name="Econ">
      </div>
      <div>
        <label>Relation to Emergency Contact</label>
        <input type="text" name="s_col4">
      </div>

      <button type="submit" name="regSub">Submit</button>
</form>




  </body>
</html>

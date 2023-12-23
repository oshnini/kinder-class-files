<!DOCTYPE html>
<html lang="en">
<head>
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="fa fa-navicon" id="btn"></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="home.php" class="active">
          <i class="fa fa-home"></i>
          <span class="link_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="class_list.php">
          <i class="fa fa-address-book"></i>
          <span class="link_name">Class List</span>
        </a>
        <span class="tooltip">Class List</span>
      </li>
      <li>
        <a href="performance_tracker.html">
          <i class="fa fa-book"></i>
          <span class="link_name">Performance Tracker</span>
        </a>
        <span class="tooltip">Performance Tracker</span>
      </li>
      <li>
        <a href="profile-real.php">
          <i class="fa fa-calendar"></i>
          <span class="link_name">Events Calendar</span>
        </a>
        <span class="tooltip">Events Calendar</span>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-gear"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <img src="profile.jpeg" alt="profile image">
          <div class="profile_content">
            <div class="name">Anna Jhon</div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <i class="fa fa-sign-out" id="log_out"></i>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="text">Home</div>
    <div class="grid auto-fit">
      <div class="container">
        <h2>WELCOME!</h2>
        <p>This website will serve as your communication
          channel to the adviser of your child.</p>
      </div>
      <div class="container2">
        <h3>Home Learning Rules</h3>
        <li>1. Listen to your parents.</li>
        <li>2. Be ready to learn.</li>
        <li>3. Do exercises and activities on time.</li>
        <li>4. Discuss about your day.</li>
        <li>5. Have fun with your parents.</li>
      </div>
    </div>

    <div class="grid2 auto-fit">
      <div class="container3">
        <h3>Class Schedule</h3>
        <h4>Monday to Friday</h4>
        
        <div class="sched-data">
          <table>
            <tr>
              <td><span>Time</span></td>
              <td><span>Minutes</span></td>
              <td><span>Block of Time</span></td>
            </tr>
            <tr>
              <td>7:00am - 7:10am</td>
              <td>10</td>
              <td>Arrival Time</td>
          </tr>
          <tr>
            <td>7:10am - 7:20am</td>
            <td>10</td>
            <td>Meeting Time 1</td>
        </tr>
        <tr>
          <td>7:20am - 8:05am</td>
          <td>45</td>
          <td>Work Period 1</td>
      </tr>
      <tr>
          <td>8:05am - 8:15am</td>
          <td>15</td>
          <td>Meeting Time 2</td>
      </tr>
      <tr>
          <td>8:15am - 8:30am</td>
          <td>15</td>
          <td>Recess</td>
      </tr>
      <tr>
          <td>8:30am - 8:40am</td>
          <td>10</td>
          <td>Quiet Time</td>
      </tr>
      <tr>
          <td>8:40am - 8:55am</td>
          <td>15</td>
          <td>Stories / Rhymes / Poem / Song</td>
      </tr>
      <tr>
          <td>8:55am - 9:35am</td>
          <td>40</td>
          <td>Work Period 2</td>
      </tr>
      <tr>
          <td>9:35am - 9:55am</td>
          <td>20</td>
          <td>Indoor / Outdoor Activity</td>
      </tr>
      <tr>
          <td>9:55am - 10:00am</td>
          <td>5</td>
          <td>Meeting Time 3 / Dismissal Time</td>
      </tr>
          </table>
        </div>
      </div>

      <div class="container4">
        <h3>Contact Information</h3>
        <p>In case you have personal concerns regarding your child, you may
          contact me on the following accounts:
        </p>
        <li><i class="fa fa-facebook-official"></i> kinderclass official page </li>
        <li><i class="fa fa-envelope"></i> kinderclass@gmail.com</li>
        <li><i class="fa fa-mobile"></i> +63 9261709734</li>
        <li><i class="fa fa-phone"></i> (888) 432-097</li>
        <li><i class="fa fa-telegram"></i> +63 9710639075 (Ms. Charity)</li>
      </div>
    </div>
  </section>
  <!-- Scripts -->
  <script src="script.js"></script>
</body>
</html>
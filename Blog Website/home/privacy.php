<!DOCTYPE html>
<html dir='ltr' lang='en'>
<head>
  <meta charset='UTF-8'/>
  <meta content='width=device-width, initial-scale=1' name='viewport'/>
  <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
  <title>Privacy Policy - PHFOODLOG</title>
  <link rel="stylesheet" href="style.css"/>
  <link href='../images/logo.jpg' rel='icon' type='image/x-icon'/>
  <link href='../images/logo.jpg' rel='shortcut icon' type='image/x-icon'/>
</head>
<body class='onIndex onHome' id='mainContent'>
  <script>
    (localStorage.getItem('mode') === 'darkmode')
      ? document.querySelector('#mainContent').classList.add('darkMode')
      : document.querySelector('#mainContent').classList.remove('darkMode');
  </script>
  <div class='mainWrapper'>
    <header class='header' id='header'>
      <div class='headerContent'>
        <div class='headerDiv headerLeft'>
          <div class='headerIcon'></div>
          <div class='section' id='header-widget'>
            <div class='widget Header' id='Header1'>
              <div class='headerInner'>
                <h1><span class='headerTitle'>PHFOODLOG</span></h1>
              </div>
            </div>
          </div>
        </div>
        <div class='headerDiv headerRight'>
          <div class="headerIcon">
            <span aria-label="Dark" class="navDark" data-text="Dark" onclick="darkMode()" role="button"><i></i></span>
            <label aria-label="Search" class="navSearch" for="searchInput">
              <svg class="line" viewBox="0 0 24 24">
                <g transform="translate(2,2)">
                  <circle class="fill" cx="9.76659044" cy="9.76659044" r="8.9885584"></circle>
                  <line x1="16.0183067" x2="19.5423342" y1="16.4851259" y2="20.0000001"></line>
                </g>
              </svg>
            </label>
        </div>
      </div>
    </header>

    <div class='mainInner sectionInner'>
      <main class='mainbar'>
        <section class='section' id='privacy-content'>
          <div class='widget HTML'>
            <h2 class='title'>Privacy Policy</h2>
            <div class='widget-content'>
              <p>Last updated: <?php echo date('F j, Y'); ?></p>
              <h3>Information We Collect</h3>
              <p>We may collect information you provide directly (e.g., contact forms) and basic usage data (e.g., page views).</p>
              <h3>How We Use Information</h3>
              <p>To operate and improve the site, respond to inquiries, and provide content you request.</p>
              <h3>Cookies</h3>
              <p>We may use cookies to improve user experience. You can control cookies through your browser settings.</p>
              <h3>Third-Party Services</h3>
              <p>
                External links may direct you to third-party sites. Their privacy practices are not controlled by us.
                <strong> <br> WE WILL NEVER GIVE YOUR INFORMATION TO ANY THIRD-PARTIES. </strong>
              </p>
              <h3>Data Security</h3>
              <p>We take reasonable measures to protect information but cannot guarantee absolute security.</p>
              <h3>Contact</h3>
              <p>If you have questions about this policy, please use the contact information on our site.</p>
              <h3>Changes</h3>
              <p>We may update this Privacy Policy periodically. Continued use constitutes acceptance of changes.</p>
              <p><a href='index.php'>&larr; Back to Home</a></p>
            </div>
          </div>
        </section>
      </main>
    </div>

    <footer class='sectionInner'>
      <div class='creditInner'>
        <p>
          &copy; <span id='getYear'></span> &#8231; All rights reserved &#8231; <a href='terms.php'>Terms of Service</a> &#8231; <a href='privacy.php'>Privacy Policy</a>
        </p>
      </div>
    </footer>
  </div>

  <script>
    var d = new Date();
    document.getElementById('getYear').textContent = d.getFullYear();
  </script>
  <script>
    function darkMode() {
      localStorage.setItem("mode", localStorage.getItem("mode") === "darkmode" ? "light" : "darkmode");
      if (localStorage.getItem("mode") === "darkmode") {
        document.querySelector("#mainContent").classList.add("darkMode");
      } else {
        document.querySelector("#mainContent").classList.remove("darkMode");
      }
    }
  </script>
</body>
</html>

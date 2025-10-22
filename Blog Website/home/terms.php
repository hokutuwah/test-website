<!DOCTYPE html>
<html dir='ltr' lang='en'>
<head>
  <meta charset='UTF-8'/>
  <meta content='width=device-width, initial-scale=1' name='viewport'/>
  <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
  <title>Terms of Service - PHFOODLOG</title>
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
        <section class='section' id='terms-content'>
          <div class='widget HTML'>
            <h2 class='title'>Terms of Service</h2>
            <div class='widget-content'>
              <p>Last updated: <?php echo date('F j, Y'); ?></p>
              <p>Welcome to PHFOODLOG. By accessing or using this website, you agree to the following terms:</p>
              <h3>Use of the Site</h3>
              <p>Content is provided for informational purposes only. You agree not to misuse the site or engage in unlawful activity.</p>
              <h3>Intellectual Property</h3>
              <p>All content, including text and images, is owned by or licensed to PHFOODLOG. Do not copy or redistribute without permission.</p>
              <h3>Links to Other Sites</h3>
              <p>We may link to third-party sites. We are not responsible for their content or practices.</p>
              <h3>Disclaimer</h3>
              <p>The site is provided "as is" without warranties of any kind.</p>
              <h3>Changes</h3>
              <p>We may update these Terms from time to time. Continued use constitutes acceptance of the revised Terms.</p>
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

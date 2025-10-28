<?php
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="stylesheet" href="style.css" />
  <title>PHFOODLOG</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="theme-color" content="#fefefe" />
  <meta name="msapplication-navbutton-color" content="#fefefe" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#fefefe" />
  <meta name="apple-mobile-web-app-capable" content="true" />
  <link rel="apple-touch-icon" sizes="120x120" href="../images/logo.jpg" />
  <link rel="apple-touch-icon" sizes="152x152" href="../images/logo.jpg" />
  <link rel="icon" type="image/x-icon" href="../images/logo.jpg" />
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg" />
  <style>
    .postThumbnail {
      height: 180px;
      overflow: hidden;
      border-radius: 8px;
    }
    
    .postThumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
      animation: fadeIn 0.3s;
    }
    
    @keyframes fadeIn {
      from {opacity: 0}
      to {opacity: 1}
    }
    
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 0;
      border: none;
      width: 320px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      animation: slideIn 0.3s;
      overflow: hidden;
    }
    
    @keyframes slideIn {
      from {transform: translateY(-50px); opacity: 0}
      to {transform: translateY(0); opacity: 1}
    }
    
    .modal-header {
      background-color: #4CAF50;
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .modal-header h3 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }
    
    .close {
      color: white;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
      line-height: 20px;
    }
    
    .close:hover {
      opacity: 0.8;
    }
    
    .modal-body {
      padding: 20px;
    }
    
    .user-profile {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    
    .user-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      overflow: hidden;
    }
    
    .user-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .user-info h4 {
      margin: 0 0 5px 0;
      font-size: 16px;
      color: #333;
    }
    
    .user-info p {
      margin: 0;
      font-size: 14px;
      color: #666;
    }
    
    .modal-footer {
      padding: 15px 20px;
      background-color: #f9f9f9;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: space-between;
    }
    
    .modal-btn {
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.2s;
    }
    
    .btn-logout {
      background-color: #e74c3c;
      color: white;
    }
    
    .btn-logout:hover {
      background-color: #c0392b;
    }
    
    .btn-profile {
      background-color: #f0f0f0;
      color: #333;
    }
    
    .btn-profile:hover {
      background-color: #e0e0e0;
    }
    
    /* Dark mode styles */
    body.darkMode .modal-content {
      background-color: #2d2d2d;
      color: #f0f0f0;
    }
    
    body.darkMode .modal-header {
      background-color: #388E3C;
    }
    
    body.darkMode .modal-footer {
      background-color: #333;
      border-top: 1px solid #444;
    }
    
    body.darkMode .user-info h4 {
      color: #f0f0f0;
    }
    
    body.darkMode .user-info p {
      color: #bbb;
    }
    
    body.darkMode .btn-profile {
      background-color: #444;
      color: #f0f0f0;
    }
    
    body.darkMode .btn-profile:hover {
      background-color: #555;
    }
  </style>
</head>
<body class="onIndex onHome" id="mainContent">
  <script>
    (localStorage.getItem('mode') === 'darkmode')
      ? document.querySelector('#mainContent').classList.add('darkMode')
      : document.querySelector('#mainContent').classList.remove('darkMode');
  </script>

  <input class="profInput hidden" id="offprofile-box" type="checkbox" />
  <input class="navInput hidden" id="offnav-input" type="checkbox" />

  <div class="mainWrapper">
    <!-- Header -->
    <header class="header" id="header">
      <div class="headerContent">
        <div class="headerDiv headerLeft">
          <div class="headerIcon">
            <label aria-label="Menu Navigation" class="navMenu" for="offnav-input">
              <svg class="line svg-1" viewBox="0 0 24 24">
                <line x1="3" x2="21" y1="12" y2="12"></line>
                <line x1="3" x2="21" y1="6" y2="6"></line>
                <line x1="3" x2="21" y1="18" y2="18"></line>
              </svg>
              <svg class="line svg-2" viewBox="0 0 24 24">
                <g transform="translate(12,12) rotate(-90) translate(-12,-12) translate(5,8.5)">
                  <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0"></path>
                </g>
              </svg>
            </label>
          </div>
          <div class="section" id="header-widget">
            <div class="widget Header" data-version="2" id="Header1">
              <div class="headerInner">
                <h1><span class="headerTitle">PHFOODLOG</span></h1>
              </div>
              <div class="headerDesc hidden">temp1.</div>
            </div>
          </div>
        </div>

        <div class="headerDiv headerRight">
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
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              // Logged in user - show div with onclick to open modal
              echo '<div style="cursor: pointer;" onclick="openProfileModal()" aria-label="profile" class="navProfile">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(5, 2.4)">
                          <path d="M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z"></path>
                          <path d="M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z"></path>
                        </g>
                      </svg>
                    </div>';
            } else {
              // Logged out user - show proper link to login.php
              echo '<a href="login.php" aria-label="profile" class="navProfile">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(5, 2.4)">
                          <path d="M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z"></path>
                          <path d="M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z"></path>
                        </g>
                      </svg>
                    </a>';
            }
            ?>
          </div>
        </div>
      </div>
    </header>

    <!-- Navigation -->
    <div class="mainMenu">
      <div class="section" id="main-menu">
        <div class="widget HTML" data-version="2" id="HTML000">
          <ul class="htmlMenu" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <li class="close">
              <label class="link" for="offnav-input">
                <svg class="line" viewBox="0 0 24 24">
                  <g transform="translate(12,12) rotate(-270) translate(-12,-12) translate(5,8.5)">
                    <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0"></path>
                  </g>
                </svg>
                <span class="name" data-text="Back"></span>
              </label>
            </li>
            <li class="break"></li>
              <li><a class="link" href="../home/index.php" itemprop="url"><svg class="bi bi-house" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" fill-rule="evenodd"></path><path d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" fill-rule="evenodd"></path></svg><span class="name" itemprop="name">Home</span></a></li>
              <li><a class="link" href="../home/categories.php" itemprop="url"><svg class="bi bi-list-ul" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill-rule="evenodd"></path></svg><span class="name" itemprop="name">Categories</span></a></li>
              <li><a class="link" href="../home/monthly.php" itemprop="url"><svg class="bi bi-info-circle" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path></svg><span class="name" itemprop="name">Monthly Foodlog</span></a></li>
            <li class="break"></li>
              <li><a class="link" href="../home/archive.php" itemprop="url"><svg class="bi bi-lightbulb" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"></path></svg><span class="name" itemprop="name">Archives</span></a></li>
              <li><a class="link" href="../home/contact.php" itemprop="url"><svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M17.726 13.02 14 16H9v-1h4.065a.5.5 0 0 0 .416-.777l-.888-1.332A1.995 1.995 0 0 0 10.93 12H3a1 1 0 0 0-1 1v6a2 2 0 0 0 2 2h9.639a3 3 0 0 0 2.258-1.024L22 13l-1.452-.484a2.998 2.998 0 0 0-2.822.504zm1.532-5.63c.451-.465.73-1.108.73-1.818s-.279-1.353-.73-1.818A2.447 2.447 0 0 0 17.494 3S16.25 2.997 15 4.286C13.75 2.997 12.506 3 12.506 3a2.45 2.45 0 0 0-1.764.753c-.451.466-.73 1.108-.73 1.818s.279 1.354.73 1.818L15 12l4.258-4.61z"></path></svg><span class="name" itemprop="name">Contact Us</span></a></li>
            <li class="break"></li>
          </ul>
        </div>
      </div>
      <label class="fullClose menu" for="offnav-input"></label>
    </div>

    <!-- Main Content -->
    <div class="mainInner sectionInner">
      <div class="largeSection">
        <div class="no-items section" id="large-content"></div>
      </div>

      <div class="blogContent">
        <main class="mainbar">
          <div class="section" id="main-widget">
            <div class="widget Blog" data-version="2" id="Blog1">
              <div class="blogTitle">
                <h2 class="title">Featured Posts</h2>
                <div class="postMode" onclick="listMode()">
                  <svg class="line svg-1" viewBox="0 0 24 24">
                    <rect height="7" rx="2" ry="2" width="18" x="3" y="3"></rect>
                    <rect height="7" rx="2" ry="2" width="18" x="3" y="14"></rect>
                  </svg>
                  <svg class="line svg-2" viewBox="0 0 24 24">
                    <rect height="7" width="7" x="3" y="3"></rect>
                    <rect height="7" width="7" x="14" y="3"></rect>
                    <rect height="7" width="7" x="14" y="14"></rect>
                    <rect height="7" width="7" x="3" y="14"></rect>
                  </svg>
                </div>
                <script>
                  /*<![CDATA[*/
                  (localStorage.getItem('list') === 'listmode')
                    ? document.querySelector('#mainContent').classList.add('listMode')
                    : document.querySelector('#mainContent').classList.remove('listMode');
                  /*]]>*/
                </script>
              </div>

              <div class="blogPosts">
                <!-- Adobo -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/adobo.php">
                      <img alt="adobo" class="imgThumb lazy" src="../images/adobo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Adobo" href="../posts/adobo.php" rel="bookmark">Adobo</a>
                    </h2>
                    <p class="postEntry snippet">Adobo can be considered as the most popular dish out of all the Filipino food&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 15, 2025" datetime="2025-05-16T00:34:00+07:00" title="Published: May 15, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="2">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Sisig -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/sisig.php">
                      <img alt="Sisig" class="imgThumb lazy" src="../images/sisig.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Sisig" href="../posts/sisig.php" rel="bookmark">Sisig</a>
                    </h2>
                    <p class="postEntry snippet">Sisig is another well-known Filipino food. This Kapampangan dish is traditionally made by boiling&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 15, 2025" datetime="2025-05-16T00:30:00+07:00" title="Published: May 15, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="5">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Sinigang na Baboy (Dinner) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/sinigang.php">
                      <img alt="Sinigang" class="imgThumb lazy" src="../images/sinigang.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Sinigang" href="../posts/sinigang.php" rel="bookmark">Sinigang na Baboy</a>
                    </h2>
                    <p class="postEntry snippet">It is a Filipino stew composed of meat or seafood and uses tamarind (sampalok) as the souring and&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 15, 2025" datetime="2025-05-16T00:30:00+07:00" title="Published: May 15, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="6">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Kare-Kare (Dinner) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/kare-kare.php">
                      <img alt="Kare-Kare" class="imgThumb lazy" src="../images/kare-kare.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Kare-Kare" href="../posts/kare-kare.php" rel="bookmark">Kare-Kare</a>
                    </h2>
                    <p class="postEntry snippet">This is yet another stew dish in Filipino cuisine but what's unique about kare-kare as a Filipino food is how it has a thick savory peanut sauce&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 11, 2025" datetime="2025-05-11T15:58:00+07:00" title="Published: May 11, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="14">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Kinilaw -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/kinilaw.php">
                      <img alt="Kinilaw" class="imgThumb lazy" src="../images/kinilaw.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Kinilaw" href="../posts/kinilaw.php" rel="bookmark">Kinilaw</a>
                    </h2>
                    <p class="postEntry snippet">Kinilaw is a Filipino appetizer made with raw, cubed fish in a dressing based on vinegar mixed with garlic, gin&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 11, 2025" datetime="2025-05-11T15:50:00+07:00" title="Published: May 11, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="42">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Bulalo -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/bulalo.php">
                      <img alt="Bulalo" class="imgThumb lazy" src="../images/bulalo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Bulalo" href="../posts/bulalo.php" rel="bookmark">Bulalo</a>
                    </h2>
                    <p class="postEntry snippet">This traditional light-colored soup is prepared by cooking beef shanks and bone marrow until the collagen and fat dis&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 6, 2025" datetime="2025-05-07T00:19:00+07:00" title="Published: May 6, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="1">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Balut -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/balut.php">
                      <img alt="Balut" class="imgThumb lazy" src="../images/balut.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Balut" href="../posts/balut.php" rel="bookmark">Balut</a>
                    </h2>
                    <p class="postEntry snippet">Balut is both a surprise and a challenge for foreigners visiting the country — truth be told, it has become a typical dare that loc &#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 6, 2025" datetime="2025-05-06T19:24:00+07:00" title="Published: May 6, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="17">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Lechon -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/lechon.php">
                      <img alt="Lechon" class="imgThumb lazy" src="../images/lechon.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Lechon" href="../posts/lechon.php" rel="bookmark">Lechon</a>
                    </h2>
                    <p class="postEntry snippet">Lechon or roasted suckling pig is also a popular Filipino food and it is commonly served during fiestas or special occasions like bi&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 6, 2025" datetime="2025-05-06T19:18:00+07:00" title="Published: May 6, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="4">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Pancit Canton -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/pancit.php">
                      <img alt="Pancit" class="imgThumb lazy" src="https://www.maggi.ph/sites/default/files/styles/home_stage_944_531/public/srh_recipes/5b661360b8e49f5c2348c06858bb8f57.jpg?h=4f5b30f1&itok=doXJkNdF" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Pancit" href="../posts/pancit.php" rel="bookmark">Pancit Canton</a>
                    </h2>
                    <p class="postEntry snippet">These rice noodles mixed with vegetables or meat have got to be the most popular dish served during celebra&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 4, 2025" datetime="2025-05-05T00:43:00+07:00" title="Published: May 4, 2025"></time>
                    </div>
                  </div>
                </article>

                <!-- Tapsilog (Breakfast) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/tapsilog.html">
                      <img alt="Tapsilog" class="imgThumb lazy" src="https://thebakeologie.com/wp-content/uploads/2018/11/BeefTapa-1a.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Tapsilog" href="../posts/tapsilog.html" rel="bookmark">Tapsilog</a>
                    </h2>
                    <p class="postEntry snippet">A classic Filipino breakfast of tapa (cured beef), sinangag (garlic fried rice), and itlog (fried egg).</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 15, 2025" datetime="2025-05-16T00:34:00+07:00" title="Published: May 15, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="3">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Pandesal (Breakfast) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/pandesal.html">
                      <img alt="Pandesal" class="imgThumb lazy" src="https://makeitdough.com/wp-content/uploads/2023/01/Sourdough-Pandesal-18.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Pandesal" href="../posts/pandesal.html" rel="bookmark">Pandesal</a>
                    </h2>
                    <p class="postEntry snippet">Soft, slightly sweet bread rolls often eaten at breakfast with coffee or hot chocolate.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 14, 2025" datetime="2025-05-15T00:34:00+07:00" title="Published: May 14, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="5">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Longsilog (Breakfast) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/longsilog.html">
                      <img alt="Longsilog" class="imgThumb lazy" src="https://urbanblisslife.com/wp-content/uploads/2023/01/Longsilog-FEATURE.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Longsilog" href="../posts/longsilog.html" rel="bookmark">Longsilog</a>
                    </h2>
                    <p class="postEntry snippet">Filipino breakfast with sweet pork sausage (longganisa), garlic fried rice, and fried egg.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 13, 2025" datetime="2025-05-14T00:34:00+07:00" title="Published: May 13, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="2">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Champorado (Breakfast) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/champorado.html">
                      <img alt="Champorado" class="imgThumb lazy" src="https://yummykitchentv.com/wp-content/uploads/2023/08/champorado-recipe.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Champorado" href="../posts/champorado.html" rel="bookmark">Champorado</a>
                    </h2>
                    <p class="postEntry snippet">Sweet chocolate rice porridge often eaten for breakfast, usually paired with tuyo (dried fish).</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 12, 2025" datetime="2025-05-13T00:34:00+07:00" title="Published: May 12, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="4">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Tocilog (Breakfast) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/tocilog.html">
                      <img alt="Tocilog" class="imgThumb lazy" src="https://lalunacafe.ph/storage/2022/08/Tocilog-1.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Tocilog" href="../posts/tocilog.html" rel="bookmark">Tocilog</a>
                    </h2>
                    <p class="postEntry snippet">Sweet cured pork (tocino) served with garlic fried rice and fried egg, a popular Filipino breakfast.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 11, 2025" datetime="2025-05-12T00:34:00+07:00" title="Published: May 11, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="6">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Lumpia (Lunch) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/lumpia.html">
                      <img alt="Lumpia" class="imgThumb lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnO1UAVBoyrv1YtjlYJresLGUeCMNg1m2rng&s" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Lumpia" href="../posts/lumpia.html" rel="bookmark">Lumpia</a>
                    </h2>
                    <p class="postEntry snippet">Filipino spring rolls filled with savory meat and vegetables, perfect for lunch gatherings.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 9, 2025" datetime="2025-05-10T00:34:00+07:00" title="Published: May 9, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="12">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Menudo (Lunch) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/menudo.html">
                      <img alt="Menudo" class="imgThumb lazy" src="https://www.kawalingpinoy.com/wp-content/uploads/2024/12/Filipino-menudo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Menudo" href="../posts/menudo.html" rel="bookmark">Menudo</a>
                    </h2>
                    <p class="postEntry snippet">Pork stew with tomato sauce, liver, potatoes, and carrots, a hearty Filipino lunch favorite.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 8, 2025" datetime="2025-05-09T00:34:00+07:00" title="Published: May 8, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="7">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Chicken Inasal (Lunch) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/chicken-inasal.html">
                      <img alt="Chicken Inasal" class="imgThumb lazy" src="https://i0.wp.com/iankewks.com/wp-content/uploads/2022/06/IMG_4775-scaled.jpg?fit=1920%2C2560&ssl=1" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Chicken Inasal" href="../posts/chicken-inasal.html" rel="bookmark">Chicken Inasal</a>
                    </h2>
                    <p class="postEntry snippet">Grilled chicken marinated in a mixture of calamansi, vinegar, garlic, and annatto oil, a popular lunch dish.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 6, 2025" datetime="2025-05-07T00:34:00+07:00" title="Published: May 6, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="11">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Bulalo (Dinner) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/bulalo.php">
                      <img alt="Bulalo" class="imgThumb lazy" src="https://iankewks.com/wp-content/uploads/2025/01/IMG_3767.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Bulalo" href="../posts/bulalo.php" rel="bookmark">Bulalo</a>
                    </h2>
                    <p class="postEntry snippet">This traditional light-colored soup is prepared by cooking beef shanks and bone marrow until the collagen and fat dis&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 6, 2025" datetime="2025-05-07T00:19:00+07:00" title="Published: May 6, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="1">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Inihaw na Liempo (Dinner) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/inihaw-na-liempo.html">
                      <img alt="Inihaw na Liempo" class="imgThumb lazy" src="https://panlasangpinoy.com/wp-content/uploads/2009/08/Grilled-Pork-Belly-Liempo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Inihaw na Liempo" href="../posts/inihaw-na-liempo.html" rel="bookmark">Inihaw na Liempo</a>
                    </h2>
                    <p class="postEntry snippet">Grilled marinated pork belly, a popular Filipino dinner dish perfect for family gatherings.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 3, 2025" datetime="2025-05-04T00:34:00+07:00" title="Published: May 3, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="13">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Dinuguan (Dinner) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/dinuguan.html">
                      <img alt="Dinuguan" class="imgThumb lazy" src="https://images.yummy.ph/yummy/uploads/2018/01/dinuguan-1.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Dinuguan" href="../posts/dinuguan.html" rel="bookmark">Dinuguan</a>
                    </h2>
                    <p class="postEntry snippet">Pork blood stew with vinegar and spices, a unique and flavorful Filipino dinner dish.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 2, 2025" datetime="2025-05-03T00:34:00+07:00" title="Published: May 2, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="16">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>

                <!-- Leche Flan (Dessert) -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/leche-flan.html">
                      <img alt="Leche Flan" class="imgThumb lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzQeby17cbNKiAxP0FczyCYjWhsm5JNWikkA&s" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Leche Flan" href="../posts/leche-flan.html" rel="bookmark">Leche Flan</a>
                    </h2>
                    <p class="postEntry snippet">Creamy caramel custard dessert, a beloved Filipino sweet treat perfect for any occasion.</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="May 1, 2025" datetime="2025-05-02T00:34:00+07:00" title="Published: May 1, 2025"></time>
                      <a aria-label="Comments" class="postComment" data-text="18">
                        <svg class="line" viewBox="0 0 24 24">
                          <g transform="translate(2,2)">
                            <path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path>
                          </g>
                        </svg>
                      </a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- User Profile Modal - Only shown when logged in -->
<div id="profileModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>My Profile</h3>
      <span class="close" onclick="closeProfileModal()">&times;</span>
    </div>
    <div class="modal-body">
      <div class="user-profile">
        <div class="user-avatar">
          <img src="../images/logo.jpg" alt="User Avatar">
        </div>
        <div class="user-info">
          <h4><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?></h4>
          <p>Food Enthusiast</p>
        </div>
      </div>
      <div class="user-stats">
        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
          <div style="text-align: center;">
            <div style="font-size: 18px; font-weight: 600; color: #4CAF50;">0</div>
            <div style="font-size: 12px; color: #666;">Recipes</div>
          </div>
          <div style="text-align: center;">
            <div style="font-size: 18px; font-weight: 600; color: #4CAF50;">0</div>
            <div style="font-size: 12px; color: #666;">Comments</div>
          </div>
          <div style="text-align: center;">
            <div style="font-size: 18px; font-weight: 600; color: #4CAF50;">0</div>
            <div style="font-size: 12px; color: #666;">Likes</div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="modal-btn btn-profile" onclick="viewProfile()">View Profile</button>
      <button class="modal-btn btn-logout" onclick="logout()">Logout</button>
    </div>
  </div>
</div>
<?php
}
?>
<script>
  // Modal functions - only defined if modal exists
  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
  function openProfileModal() {
    console.log("Opening profile modal");
    document.getElementById('profileModal').style.display = 'block';
    return false;
  }
  
  function closeProfileModal() {
    console.log("Closing profile modal");
    document.getElementById('profileModal').style.display = 'none';
  }
  
  // Close modal when clicking outside of it
  window.onclick = function(event) {
    const modal = document.getElementById('profileModal');
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }
  
  // Logout function
  function logout() {
    console.log("Logging out");
    window.location.href = 'logout.php';
  }
  
  // View profile function
  function viewProfile() {
    console.log("Viewing profile");
    window.location.href = 'profile.php';
  }
  <?php endif; ?>
</script>
</body>
</html>
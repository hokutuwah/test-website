<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="stylesheet" href="style.css" />
  <title>PHFOODLOG: Monthly FoodBlog</title>
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
              echo '<a href="logout.php" aria-label="profile" class="navProfile">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(5, 2.4)">
                          <path d="M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z"></path>
                          <path d="M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z"></path>
                        </g>
                      </svg>
                    </a>';
            } else {
              echo '<a href="login.html" aria-label="profile" class="navProfile">
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
            <li><a class="link" href="../home/categories.html" itemprop="url"><svg class="bi bi-list-ul" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill-rule="evenodd"></path></svg><span class="name" itemprop="name">Categories</span></a></li>
            <li class="break"></li>
            <li><a class="link" href="../home/archive.html" itemprop="url" target="_blank"><svg class="bi bi-lightbulb" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"></path></svg><span class="name" itemprop="name">Archives</span></a></li>
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

          <!-- February -->
          <div class="section" id="main-widget">
            <div class="widget Blog" data-version="2" id="Blog1">
              <div class="blogTitle">
                <h2 class="title">February</h2>
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
                  (localStorage.getItem('list') === 'listmode')
                    ? document.querySelector('#mainContent').classList.add('listMode')
                    : document.querySelector('#mainContent').classList.remove('listMode');
                </script>
              </div>
              <div class="blogPosts">
                <!-- Kare-Kare -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/kare-kare.html">
                      <img alt="Kare-Kare" class="imgThumb lazy" src="../images/kare-kare.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Kare-Kare" href="../posts/kare-kare.html" rel="bookmark">Kare-Kare</a>
                    </h2>
                    <p class="postEntry snippet">This is yet another stew dish in Filipino cuisine but what’s unique about kare-kare as a Filipino food is how it has a thick savory peanut sauce&#8230;</p>
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
                    <a href="../posts/kinilaw.html">
                      <img alt="Kinilaw" class="imgThumb lazy" src="../images/kinilaw.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Kinilaw" href="../posts/kinilaw.html" rel="bookmark">Kinilaw</a>
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
                    <a href="../posts/bulalo.html">
                      <img alt="Bulalo" class="imgThumb lazy" src="../images/bulalo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Bulalo" href="../posts/bulalo.html" rel="bookmark">Bulalo</a>
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
                    <a href="../posts/balut.html">
                      <img alt="Balut" class="imgThumb lazy" src="../images/balut.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Balut" href="../posts/balut.html" rel="bookmark">Balut</a>
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
                    <a href="../posts/lechon.html">
                      <img alt="Lechon" class="imgThumb lazy" src="../images/lechon.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Lechon" href="../posts/lechon.html" rel="bookmark">Lechon</a>
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

                <!-- Pancit -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/pancit.html">
                      <img alt="Pancit" class="imgThumb lazy" src="../images/pancit.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Pancit" href="../posts/pancit.html" rel="bookmark">Pancit</a>
                    </h2>
                    <p class="postEntry snippet">These rice noodles mixed with vegetables or meat have got to be the most popular dish served during celebra&#8230;</p>
                    <div class="postInfo">
                      <time class="postTimestamp published" data-text="February 4, 2025" datetime="2025-05-05T00:43:00+07:00" title="Published: May 4, 2025"></time>
                    </div>
                  </div>
                </article>

          <!-- May -->
          <div class="section" id="main-widget">
            <div class="widget Blog" data-version="2" id="Blog1">
              <div class="blogTitle">
                <h2 class="title">May</h2>
              </div>
              <div class="blogPosts">
                <!-- Adobo -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/adobo.html">
                      <img alt="adobo" class="imgThumb lazy" src="../images/adobo.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Adobo" href="../posts/adobo.html" rel="bookmark">Adobo</a>
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
                    <a href="../posts/sisig.html">
                      <img alt="Sisig" class="imgThumb lazy" src="../images/sisig.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Sisig" href="../posts/sisig.html" rel="bookmark">Sisig</a>
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
                <!-- Sinigang -->
                <article class="hentry">
                  <div class="postThumbnail">
                    <a href="../posts/sinigang.html">
                      <img alt="Sinigang" class="imgThumb lazy" src="../images/sinigang.jpg" />
                    </a>
                  </div>
                  <div class="postContent">
                    <h2 class="postTitle">
                      <a data-text="Sinigang" href="../posts/sinigang.html" rel="bookmark">Sinigang</a>
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
              </div>
            </div>
          </div>

          <div class="section" id="add-widget">
            <div class="widget HTML" data-version="2" id="HTML1">
              <div class="widget-content"></div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Footer -->
    <footer class="sectionInner">
      <div class="creditInner">
        <p>
          &copy; <span id="getYear">
            <script>
              /*<![CDATA[*/
              var d = new Date();
              var n = d.getFullYear();
              document.getElementById('getYear').innerHTML = n;
              /*]]>*/
            </script>
          </span>
          &middot; All rights reserved &middot;
          <a href="terms.php">Terms of Service</a> &middot;
          <a href="privacy.php">Privacy Policy</a>
        </p>
        <div class="toTop" onclick="window.scrollTo({top: 0});">
          <svg class="line" viewBox="0 0 24 24">
            <g transform="translate(12,12) rotate(-180) translate(-12,-12) translate(5,8.5)">
              <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0"></path>
            </g>
          </svg>
        </div>
      </div>
    </footer>
  </div>

  <!-- Scripts -->
  <script>
    function darkMode() {
      localStorage.setItem("mode", localStorage.getItem("mode") === "darkmode" ? "light" : "darkmode");
      if (localStorage.getItem("mode") === "darkmode") {
        document.querySelector("#mainContent").classList.add("darkMode");
      } else {
        document.querySelector("#mainContent").classList.remove("darkMode");
      }
    }

    function listMode() {
      localStorage.setItem("list", localStorage.getItem("list") === "listmode" ? "grid" : "listmode");
      if (localStorage.getItem("list") === "listmode") {
        document.querySelector("#mainContent").classList.add("listMode");
      } else {
        document.querySelector("#mainContent").classList.remove("listMode");
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/gh/aFarkas/lazysizes@5.3.0/lazysizes.min.js" async></script>
  <script>
    function wrap(t,e,r){for(var i=document.querySelectorAll(e),o=0;o<i.length;o++){var a=t+i[o].outerHTML+r;i[o].outerHTML=a}}
    wrap("<div class='zoomclick'>",".postbody img","</div>");
    wrap("<div class='zoomclick'>",".postBody img","</div>");
    var container = document.getElementsByClassName("zoomclick");
    for (var i = 0; i < container.length; i++) {
      container[i].onclick = function() {
        this.classList.toggle('active');
        document.body.classList.toggle('flow');
      };
    }
  </script>
</body>
</html>
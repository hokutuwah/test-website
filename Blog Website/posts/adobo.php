<?php
session_start();
require_once '../home/db_config.php';
$post_id = 'adobo';
$comments = [];

// Fetch comments for EVERYONE (guests included)
$stmt = $conn->prepare("SELECT author_name, comment_text, created_at FROM comments WHERE post_id = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $post_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}
$stmt->close();

// Handle comment submission ONLY if logged in
$show_form = isset($_SESSION['user_id']);
if ($show_form && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_message'])) {
    $user_id = $_SESSION['user_id'];
    $author_name = $_SESSION['username'] ?? 'Anonymous';
    $comment_text = trim($_POST['comment_message']);
    if (!empty($comment_text)) {
        $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, author_name, comment_text) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $post_id, $user_id, $author_name, $comment_text);
        $stmt->execute();
        $stmt->close();
        header("Location: adobo.php");
        exit();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Adobo – PHFOODLOG</title>
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
    /* Comment Styles */
    .comment-list {
      margin-bottom: 20px;
    }
    .comment-item {
      display: flex;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eee;
    }
    .comment-avatar {
      margin-right: 15px;
      flex-shrink: 0;
    }
    .comment-avatar img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
    .comment-content {
      flex-grow: 1;
    }
    .comment-header {
      margin-bottom: 5px;
    }
    .comment-author {
      font-weight: 600;
      margin-right: 10px;
    }
    .comment-date {
      color: #666;
      font-size: 14px;
    }
    .comment-text {
      margin-bottom: 10px;
      line-height: 1.5;
    }
    .comment-actions {
      display: flex;
      gap: 15px;
    }
    .comment-reply, .comment-like {
      background: none;
      border: none;
      color: #4CAF50;
      cursor: pointer;
      font-size: 14px;
      padding: 0;
    }
    .comment-reply:hover, .comment-like:hover {
      text-decoration: underline;
    }
    .commentForm {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }
    .commentForm h4 {
      margin-bottom: 15px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-family: inherit;
    }
    .submit-comment {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 500;
    }
    .submit-comment:hover {
      background-color: #388E3C;
    }
    .comment-success {
      background-color: #dff0d8;
      color: #3c763d;
      padding: 10px;
      border-radius: 4px;
      margin-top: 10px;
    }
    /* Dark mode styles for comments */
    body.darkMode .comment-item {
      border-bottom-color: #444;
    }
    body.darkMode .comment-date {
      color: #bbb;
    }
    body.darkMode .commentForm {
      border-top-color: #444;
    }
    body.darkMode .form-group input, 
    body.darkMode .form-group textarea {
      background-color: #333;
      border-color: #444;
      color: #f0f0f0;
    }
  </style>
</head>
<body class="onItem onPost" id="mainContent">
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
              echo '<div style="cursor: pointer;" onclick="openProfileModal()" aria-label="profile" class="navProfile">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(5, 2.4)">
                          <path d="M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z"></path>
                          <path d="M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z"></path>
                        </g>
                      </svg>
                    </div>';
            } else {
              echo '<a href="../home/login.php" aria-label="profile" class="navProfile">
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
              <div class="blogPosts">
                <article class="hentry post">
                  <h1 class="postTitle">
                    <span>Adobo</span>
                  </h1>
                  <div class="postInfo">
                    <div class="postAuthor">
                      <div class="postAuthorImage"></div>
                      <div class="postAuthorName">
                        <div class="authorName fn" data-text="" data-write=""></div>
                      </div>
                    </div>
                    <div class="postComments">
                      <label for="offshare-check">
                        <svg class="line" viewBox="0 0 24 24">
                          <path class="fill" d="M92.30583,264.72053a3.42745,3.42745,0,0,1-.37,1.57,3.51,3.51,0,1,1,0-3.13995A3.42751,3.42751,0,0,1,92.30583,264.72053Z" transform="translate(-83.28571 -252.73452)"></path>
                          <circle class="fill" cx="18.48892" cy="5.49436" r="3.51099"></circle>
                          <circle class="fill" cx="18.48892" cy="18.50564" r="3.51099"></circle>
                          <line class="cls-3" x1="12.53012" x2="8.65012" y1="8.476" y2="10.416"></line>
                          <line class="cls-3" x1="12.53012" x2="8.65012" y1="15.496" y2="13.556"></line>
                        </svg>
                      </label>
                    </div>
                  </div>
                  <div class="postTimes">
                    <div class="postDatetime">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(2.7498, 2.0501)">
                          <path d="M-1.0658141e-14,10.7255 C-1.0658141e-14,3.7695 2.319,1.4515 9.274,1.4515 C16.23,1.4515 18.549,3.7695 18.549,10.7255 C18.549,17.6815 16.23,19.9995 9.274,19.9995 C2.319,19.9995 -1.0658141e-14,17.6815 -1.0658141e-14,10.7255 Z"></path>
                          <line x1="0.2754" x2="18.2834" y1="7.2739" y2="7.2739"></line>
                          <line x1="13.2832" x2="13.2832" y1="2.84217094e-14" y2="3.262"></line>
                          <line x1="5.2749" x2="5.2749" y1="2.84217094e-14" y2="3.262"></line>
                        </g>
                      </svg>
                      <time class="postTimestamp published" data-text="May 18, 2025" datetime="2025-05-18T15:11:00+07:00" title="Published: May 18, 2025"></time>
                    </div>
                    <div class="postReadtime">
                      <svg class="line" viewBox="0 0 24 24">
                        <g transform="translate(2,2)">
                          <path d="M0.7501,10.0001 C0.7501,16.9371 3.0631,19.2501 10.0001,19.2501 C16.9371,19.2501 19.2501,16.9371 19.2501,10.0001 C19.2501,3.0631 16.9371,0.7501 10.0001,0.7501 C3.0631,0.7501 0.7501,3.0631 0.7501,10.0001 Z"></path>
                          <polyline points="13.3902 12.0181 9.9992 9.9951 9.9992 5.6341"></polyline>
                        </g>
                      </svg>
                      <span id="readTime"></span>
                    </div>
                  </div>
                  <div class="postInner">
                    <div class="postAd"></div>
                    <div class="postEntry" id="postID-7245735994848929737">
                      <div class="postBody" id="postBody">
                        <div class="separator" style="clear: both; text-align: center;">
                          <img data-original-height="1200" data-original-width="900" height="640" src="../images/adobo.jpg" width="480" />
                        </div>
                        <p style="font-size: 12px; margin-top: 0px; text-align: center;">
                          Adobo Served With Rice
                        </p>

                        <input checked class="allTabs hidden" id="forall-tabs1" name="postTabs" type="radio" />
                        <input class="allTabs hidden" id="forall-tabs2" name="postTabs" type="radio" />
                        <input class="allTabs hidden" id="forall-tabs3" name="postTabs" type="radio" />
                        <input class="allTabs hidden" id="forall-tabs4" name="postTabs" type="radio" />

                        <div class="postTabs">
                          <div class="tabsHead">
                            <label for="forall-tabs1" data-text="Description"></label>
                            <label for="forall-tabs2" data-text="Recipe"></label>
                            <label for="forall-tabs3" data-text="How to Make"></label>
                            <label for="forall-tabs4" data-text="Serving Size"></label>
                          </div>
                          <div class="tabsContent">
                            <div class="tabsContent-1">
                              <p style="font-size: 15px; text-align: justify;">
                                Adobo can be considered as the most popular dish out of all the Filipino food, often regarded as the unofficial national dish of the Philippines. This savory and tangy dish showcases the rich culinary heritage of the country, with its roots tracing back to the Spanish colonial period. Adobo is characterized by its unique cooking method, which involves marinating meat—commonly chicken, pork, or a combination of both—in a mixture of soy sauce, vinegar, garlic, bay leaves, and black peppercorns.
                                The marination process not only infuses the meat with deep flavors but also acts as a preservative, making adobo a practical dish for families. After marinating, the meat is simmered until tender, allowing the flavors to meld beautifully. The result is a dish that is both comforting and satisfying, often served with steamed rice to soak up the delicious sauce.
                                One of the remarkable aspects of adobo is its versatility. Different regions and families have their own variations, incorporating local ingredients or adjusting the balance of flavors to suit personal preferences. Some may add coconut milk for a creamier texture, while others might include potatoes or hard-boiled eggs. This adaptability has contributed to adobo's widespread popularity, making it a staple in Filipino households and a must-try for anyone exploring Filipino cuisine. Whether enjoyed at a family gathering or a festive celebration, adobo remains a beloved symbol of Filipino culture and culinary tradition.
                              </p>
                            </div>
                            <div class="tabsContent-2">
                              <div class="spe">
                                <p>
                                  <strong>Ingredients:</strong><br>
                                  - 1 kg chicken (or pork, or a combination)<br>
                                  - 1/2 cup soy sauce<br>
                                  - 1/2 cup vinegar (white or cane vinegar)<br>
                                  - 1 onion, sliced<br>
                                  - 4-5 cloves garlic, minced<br>
                                  - 2-3 bay leaves<br>
                                  - 1 teaspoon black peppercorns<br>
                                  - 1 tablespoon cooking oil<br>
                                  - Salt to taste<br>
                                  - Water (as needed)<br><br>
                                </p>
                              </div>
                            </div>
                            <div class="tabsContent-3">
                              <div class="spe">
                                <p>
                                  <strong>Instructions:</strong><br>
                                  1. <strong>Marinate the Meat:</strong><br>
                                  In a bowl, combine the chicken (or pork) with soy sauce, vinegar, minced garlic, sliced onion, bay leaves, and black peppercorns. Marinate for at least 30 minutes, or preferably overnight in the refrigerator for deeper flavor.<br><br>
                                  2. <strong>Cook the Meat:</strong><br>
                                  Heat cooking oil in a large pot over medium heat. Remove the meat from the marinade (reserve the marinade) and brown it in the pot for about 5-7 minutes.<br><br>
                                  3. <strong>Add the Marinade:</strong><br>
                                  Pour the reserved marinade into the pot along with enough water to cover the meat. Bring to a boil, then reduce the heat to low and let it simmer for about 30-40 minutes, or until the meat is tender. Stir occasionally and adjust seasoning with salt if needed.<br><br>
                                  4. <strong>Serve:</strong><br>
                                  Once the meat is tender and the sauce has thickened to your liking, remove from heat. Serve the adobo hot over steamed rice, garnished with additional bay leaves if desired.<br><br>
                                  <strong>Tips:</strong><br>
                                  - Feel free to customize your adobo by adding potatoes, hard-boiled eggs, or even coconut milk for a different twist.<br>
                                  - Adjust the balance of soy sauce and vinegar according to your taste preference.
                                </p>
                              </div>
                            </div>
                            <div class="tabsContent-4">
                              <p style="font-size: 15px; text-align: justify;">
                                6 to 8 servings, depending on portion size and accompaniments. <br>
                                Ideal for: A family meal or small gathering. If you're planning for a party or batch cooking, you can easily scale the ingredients up.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="postAd"></div>
                  <script>
                    /*<![CDATA[*/
                    function get_text(el) {
                      ret = "";
                      var length = el.childNodes.length;
                      for (var i = 0; i < length; i++) {
                        var node = el.childNodes[i];
                        if (node.nodeType != 8) {
                          ret += node.nodeType != 1 ? node.nodeValue : get_text(node);
                        }
                      }
                      return ret;
                    }
                    var words = get_text(document.getElementById('postBody'));
                    var count = words.split(' ').length;
                    var avg = 200;
                    var counted = count / avg;
                    var maincount = Math.round(counted);
                    document.getElementById("readTime").innerHTML = maincount + " minute read";
                    /*]]>*/
                  </script>
                  <div class="postAuthors">
                    <div class="authorInfo">
                      <div class="authorName" data-text="Dheniel Ranas" data-write="Written by"></div>
                      <div class="authorAbout" data-text="Support Developer"></div>
                    </div>
                  </div>
                  <input class="shareIn hidden" id="offshare-check" type="checkbox" />
                  <div class="shareInner">
                    <div class="shareBlock">
                      <div class="shareHeader" data-text="Share to other apps">
                        <label for="offshare-check">
                          <svg class="line" viewBox="0 0 24 24">
                            <line x1="18" x2="6" y1="6" y2="18"></line>
                            <line x1="6" x2="18" y1="6" y2="18"></line>
                          </svg>
                        </label>
                      </div>
                      <div class="shareBox">
                        <div class="sharePreview">
                          <div class="previewImg lazy" data-bg="../images/adobo.jpg"></div>
                          <div class="previewContent">
                            <div class="previewTitle" data-text="Adobo"></div>
                          </div>
                        </div>
                        <ul>
                          <li>
                            <div class="copyLink" data-text="Copy link" onclick="copyFunction()">
                              <svg class="line" viewBox="0 0 24 24">
                                <g transform="translate(3.6498, 2.7499)">
                                  <line x1="10.6555" x2="5.2555" y1="12.6999" y2="12.6999"></line>
                                  <line x1="8.6106" x2="5.2546" y1="8.6886" y2="8.6886"></line>
                                  <path d="M16.51,5.55 L10.84,0.15 C10.11,0.05 9.29,0 8.39,0 C2.1,0 0,2.32 0,9.25 C0,16.19 2.1,18.5 8.39,18.5 C14.69,18.5 16.79,16.19 16.79,9.25 C16.79,7.83 16.7,6.6 16.51,5.55 Z"></path>
                                  <path d="M10.2844,0.0827 L10.2844,2.7437 C10.2844,4.6017 11.7904,6.1067 13.6484,6.1067 L16.5994,6.1067"></path>
                                </g>
                              </svg>
                            </div>
                            <input id="getlink" readonly="readonly" type="text" />
                            <div class="shareNotif" id="shareNotif"></div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <label class="fullClose" for="offshare-check"></label>
                  </div>
                </article>

                <div class="postFooter">
                  <div class="relatedPosts">
                    <div id="relatedPosts">
                      <h3 class="title">You may like these posts</h3>
                      <ul class="related style-2">
                        <li>
                          <div class="item">
                            <div class="itemThumbnail postThumbnail">
                              <a aria-label="Pancit" href="../posts/pancit.html">
                                <div class="lazyloaded">
                                  <img src="../images/pancit.jpg" />
                                </div>
                              </a>
                            </div>
                            <div class="itemTitle">
                              <a href="../posts/pancit.html">
                                <span>Pancit</span>
                              </a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <div class="itemThumbnail postThumbnail">
                              <a aria-label="Sinigang" href="../posts/sinigang.html">
                                <div class="lazyloaded">
                                  <img src="../images/sinigang.jpg" />
                                </div>
                              </a>
                            </div>
                            <div class="itemTitle">
                              <a href="../posts/sinigang.html">
                                <span>Sinigang</span>
                              </a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <div class="itemThumbnail postThumbnail">
                              <a aria-label="Sisig" href="../posts/sisig.html">
                                <div class="lazyloaded">
                                  <img src="../images/sisig.jpg" />
                                </div>
                              </a>
                            </div>
                            <div class="itemTitle">
                              <a href="../posts/sisig.html">
                                <span>Sisig</span>
                              </a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Comments Section -->
                <div class="blogComments" id="comments">
                  <input class="commentShow hidden" id="forshow-comment" type="checkbox" />
                  <label class="commentsButton button outline" for="forshow-comment">
                    <span data-text="View Comments"></span>
                  </label>
                  <section class="comments threaded commentFixed" data-embed="true" data-num-comments="<?= count($comments) ?>">
                    <div class="commentSection" id="commentSection">
                      <input class="commentAll hidden" id="forall-comment" type="checkbox" />
                      <div class="commentsTitle">
                        <h3 class="title">Comments (<?= count($comments) ?>)</h3>
                        <div class="commentsIcon">
                          <label aria-label="Close comment" class="commentClose" data-text="Close" for="forshow-comment">
                            <svg class="line" viewBox="0 0 24 24">
                              <line x1="18" x2="6" y1="6" y2="18"></line>
                              <line x1="6" x2="18" y1="6" y2="18"></line>
                            </svg>
                          </label>
                        </div>
                      </div>
                      <div class="commentsInner">
                        <!-- Display ALL comments (visible to everyone) -->
                        <div class="comment-list">
                          <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $c): ?>
                              <div class="comment-item">
                                <div class="comment-avatar">
                                  <img src="https://picsum.photos/seed/<?= urlencode($c['author_name']) ?>/50/50.jpg" alt="<?= htmlspecialchars($c['author_name']) ?>">
                                </div>
                                <div class="comment-content">
                                  <div class="comment-header">
                                    <span class="comment-author"><?= htmlspecialchars($c['author_name']) ?></span>
                                    <span class="comment-date"><?= htmlspecialchars(date('F j, Y', strtotime($c['created_at']))) ?></span>
                                  </div>
                                  <div class="comment-text"><?= htmlspecialchars($c['comment_text']) ?></div>
                                  <div class="comment-actions">
                                    <button class="comment-reply">Reply</button>
                                    <button class="comment-like">Like</button>
                                  </div>
                                </div>
                              </div>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <p>No comments yet.</p>
                          <?php endif; ?>
                        </div>

                        <!-- Comment form: only for logged-in users -->
                        <?php if ($show_form): ?>
                          <div class="commentForm">
                            <h4>Leave a Comment</h4>
                            <form method="POST">
                              <div class="form-group">
                                <textarea name="comment_message" placeholder="Your Comment" rows="4" required></textarea>
                              </div>
                              <button type="submit" class="submit-comment">Post Comment</button>
                            </form>
                          </div>
                        <?php else: ?>
                          <div class="commentForm" style="text-align: center; padding-top: 15px; color: #666; font-style: italic;">
                            <p><a href="../home/login.php" style="color: #4CAF50;">Log in</a> to leave a comment.</p>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <label class="fullClose" for="forshow-comment"></label>
                  </section>
                </div>
                <!-- End Comments Section -->

              </div>
            </div>
          </div>

          <div class="widget HTML" data-version="2" id="HTML01">
            <div class="widget-content">
              <div class="adsHere ads-here"></div>
              <script>
                /*<![CDATA[*/
                function insertAfter(tbh, tgt) {
                  var prt = tgt.parentNode;
                  if (prt.lastChild == tgt) {
                    prt.appendChild(tbh);
                  } else {
                    prt.insertBefore(tbh, tgt.nextSibling);
                  }
                }
                var tgt = document.getElementById("postBody");
                var midAd01 = document.getElementById("HTML01");
                var showAd01 = tgt.getElementsByTagName("p");
                if (showAd01.length > 0) {
                  insertAfter(midAd01, showAd01[15]);
                };
                /*]]>*/
              </script>
            </div>
          </div>

          <div class="widget HTML" data-version="2" id="HTML02">
            <div class="widget-content">
              <script>
                /*<![CDATA[*/
                function insertAfter(tbh, tgt) {
                  var prt = tgt.parentNode;
                  if (prt.lastChild == tgt) {
                    prt.appendChild(tbh);
                  } else {
                    prt.insertBefore(tbh, tgt.nextSibling);
                  }
                }
                var tgt = document.getElementById("postBody");
                var midAd02 = document.getElementById("HTML02");
                var showAd02 = tgt.getElementsByTagName("p");
                if (showAd02.length > 0) {
                  insertAfter(midAd02, showAd02[25]);
                };
                /*]]>*/
              </script>
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
              document.getElementById('getYear').innerHTML = new Date().getFullYear();
            </script>
          </span>
          &middot; All rights reserved &middot; <a href="../home/terms.php">Terms of Service</a> &middot; <a href="../home/privacy.php">Privacy Policy</a>
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
  </script>
  <script src="https://cdn.jsdelivr.net/gh/aFarkas/lazysizes@5.3.0/lazysizes.min.js" async></script>
  <script>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
    function openProfileModal() {
      document.getElementById('profileModal').style.display = 'block';
      return false;
    }
    function closeProfileModal() {
      document.getElementById('profileModal').style.display = 'none';
    }
    window.onclick = function(event) {
      const modal = document.getElementById('profileModal');
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
    function logout() {
      window.location.href = '../home/logout.php';
    }
    function viewProfile() {
      window.location.href = '../home/profile.php';
    }
    <?php endif; ?>
  </script>

  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
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
  <?php endif; ?>
</body>
</html>
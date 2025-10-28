<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="stylesheet" href="style.css" />
  <title>PHFOODLOG - Categories</title>
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
  
  <!-- Custom styles for categories page -->
  <style>
    .categoryGrid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }
    
    .categoryCard {
      background-color: var(--content-bg);
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }
    
    .categoryCard:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .categoryImage {
      height: 150px;
      overflow: hidden;
    }
    
    .categoryImage img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    .categoryCard:hover .categoryImage img {
      transform: scale(1.05);
    }
    
    .categoryContent {
      padding: 15px;
    }
    
    .categoryTitle {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--head-color);
    }
    
    .categoryDescription {
      font-size: 0.9rem;
      color: var(--body-color);
      margin-bottom: 15px;
    }
    
    .categoryCount {
      font-size: 0.8rem;
      color: var(--body-altColor);
    }
    
    .categoryPosts {
      display: none;
      margin-top: 20px;
    }
    
    .categoryPosts.active {
      display: block;
    }
    
    .backButton {
      display: inline-flex;
      align-items: center;
      margin-bottom: 20px;
      color: var(--link-color);
      cursor: pointer;
    }
    
    .backButton:hover {
      opacity: 0.7;
    }
    
    .backButton svg {
      margin-right: 8px;
    }
    
    .postGrid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }
    
    .postCard {
      background-color: var(--content-bg);
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .postCard:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .postImage {
      height: 180px;
      overflow: hidden;
    }
    
    .postImage img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    .postCard:hover .postImage img {
      transform: scale(1.05);
    }
    
    .postContent {
      padding: 15px;
    }
    
    .postTitle {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--head-color);
    }
    
    .postDescription {
      font-size: 0.9rem;
      color: var(--body-color);
      margin-bottom: 10px;
    }
    
    .postMeta {
      font-size: 0.8rem;
      color: var(--body-altColor);
      display: flex;
      justify-content: space-between;
    }
    
    .darkMode .categoryCard,
    .darkMode .postCard {
      background-color: var(--dark-bgAlt);
    }
    
    .darkMode .categoryTitle,
    .darkMode .postTitle {
      color: var(--dark-text);
    }
    
    .darkMode .categoryDescription,
    .darkMode .postDescription {
      color: var(--dark-textAlt);
    }
    
    .darkMode .categoryCount,
    .darkMode .postMeta {
      color: var(--dark-textAlt);
    }
  </style>
</head>
<body class="onIndex onCategories" id="mainContent">
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
              <li><a class="link active" href="../home/categories.php" itemprop="url"><svg class="bi bi-list-ul" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill-rule="evenodd"></path></svg><span class="name" itemprop="name">Categories</span></a></li>
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
                <h2 class="title">Categories</h2>
              </div>

              <!-- Categories Grid -->
              <div id="categoriesView" class="categoryGrid">
                <!-- Breakfast Category -->
                <div class="categoryCard" data-category="breakfast">
                  <div class="categoryImage">
                    <img src="https://images.unsplash.com/photo-1525373612132-b3e820b87cea?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Breakfast">
                  </div>
                  <div class="categoryContent">
                    <h3 class="categoryTitle">Breakfast</h3>
                    <p class="categoryDescription">Start your day with these traditional Filipino breakfast dishes.</p>
                    <p class="categoryCount">10 recipes</p>
                  </div>
                </div>

                <!-- Lunch Category -->
                <div class="categoryCard" data-category="lunch">
                  <div class="categoryImage">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Lunch">
                  </div>
                  <div class="categoryContent">
                    <h3 class="categoryTitle">Lunch</h3>
                    <p class="categoryDescription">Hearty Filipino dishes perfect for lunchtime.</p>
                    <p class="categoryCount">10 recipes</p>
                  </div>
                </div>

                <!-- Dinner Category -->
                <div class="categoryCard" data-category="dinner">
                  <div class="categoryImage">
                    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Dinner">
                  </div>
                  <div class="categoryContent">
                    <h3 class="categoryTitle">Dinner</h3>
                    <p class="categoryDescription">Satisfying Filipino dinner recipes for the whole family.</p>
                    <p class="categoryCount">10 recipes</p>
                  </div>
                </div>

                <!-- Dessert Category -->
                <div class="categoryCard" data-category="dessert">
                  <div class="categoryImage">
                    <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Dessert">
                  </div>
                  <div class="categoryContent">
                    <h3 class="categoryTitle">Dessert</h3>
                    <p class="categoryDescription">Sweet Filipino treats to end your meal.</p>
                    <p class="categoryCount">10 recipes</p>
                  </div>
                </div>
              </div>

              <!-- Category Posts View (Initially Hidden) -->
              <div id="categoryPostsView" class="categoryPosts">
                <div class="backButton" onclick="showCategories()">
                  <svg class="line" viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6"></polyline>
                  </svg>
                  Back to Categories
                </div>
                <h2 class="categoryTitle" id="currentCategoryTitle"></h2>
                <div class="postGrid" id="categoryPostsContainer"></div>
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
              var d = new Date();
              var n = d.getFullYear();
              document.getElementById('getYear').innerHTML = n;
            </script>
          </span>
          &middot; All rights reserved &middot; <a href="terms.php">Terms of Service</a> &middot; <a href="privacy.php">Privacy Policy</a>
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

    // Sample posts data (in a real application, this would come from a database or API)
    const posts = [
      // Breakfast posts
      { id: 1, title: "Tapsilog", category: "breakfast", img: "https://thebakeologie.com/wp-content/uploads/2018/11/BeefTapa-1a.jpg", description: "A classic Filipino breakfast of tapa (cured beef), sinangag (garlic fried rice), and itlog (fried egg)." },
      { id: 2, title: "Pandesal", category: "breakfast", img: "https://makeitdough.com/wp-content/uploads/2023/01/Sourdough-Pandesal-18.jpg", description: "Soft, slightly sweet bread rolls often eaten at breakfast." },
      { id: 3, title: "Longsilog", category: "breakfast", img: "https://urbanblisslife.com/wp-content/uploads/2023/01/Longsilog-FEATURE.jpg", description: "Filipino breakfast with sweet pork sausage (longganisa), garlic fried rice, and fried egg." },
      { id: 4, title: "Champorado", category: "breakfast", img: "https://yummykitchentv.com/wp-content/uploads/2023/08/champorado-recipe.jpg", description: "Sweet chocolate rice porridge often eaten for breakfast." },
      { id: 5, title: "Tocilog", category: "breakfast", img: "https://lalunacafe.ph/storage/2022/08/Tocilog-1.jpg", description: "Sweet cured pork (tocino) served with garlic fried rice and fried egg." },
      
      // Lunch posts
      { id: 11, title: "Pancit Canton", category: "lunch", img: "https://www.maggi.ph/sites/default/files/styles/home_stage_944_531/public/srh_recipes/5b661360b8e49f5c2348c06858bb8f57.jpg?h=4f5b30f1&itok=doXJkNdF", description: "Stir-fried egg noodles with vegetables, pork, shrimp, and soy sauce." },
      { id: 12, title: "Lumpia", category: "lunch", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnO1UAVBoyrv1YtjlYJresLGUeCMNg1m2rng&s", description: "Filipino spring rolls filled with savory meat and vegetables." },
      { id: 13, title: "Adobo", category: "lunch", img: "https://cdn.apartmenttherapy.info/image/upload/f_jpg,q_auto:eco,c_fill,g_auto,w_1500,ar_4:3/k%2FPhoto%2FRecipes%2F2024-04-filipino-adobo%2Ffilipino-adobo-426", description: "Iconic Filipino dish of chicken or pork stewed in vinegar, soy sauce, garlic, and spices." },
      { id: 14, title: "Gising-Gising", category: "lunch", img: "https://www.kawalingpinoy.com/wp-content/uploads/2015/01/gising-gising-bangus-5.jpg", description: "Spicy chopped green beans in coconut milk with chili and ground meat." },
      { id: 15, title: "Menudo", category: "lunch", img: "https://www.kawalingpinoy.com/wp-content/uploads/2024/12/Filipino-menudo.jpg", description: "Pork stew with tomato sauce, liver, potatoes, and carrots." },
      
      // Dinner posts
      { id: 21, title: "Sinigang na Baboy", category: "dinner", img: "https://iankewks.com/wp-content/uploads/2024/10/IMG_8605-500x375.jpg", description: "Pork sour soup with tamarind broth and assorted vegetables." },
      { id: 22, title: "Kare-Kare", category: "dinner", img: "https://www.foodies.ph/_recipeimage/267792/kare-kare-1-2x-1124.jpeg", description: "Oxtail stew in peanut sauce, served with bagoong (shrimp paste)." },
      { id: 23, title: "Pinakbet", category: "dinner", img: "https://curiousflavors.com/wp-content/uploads/2022/04/Untitled-design-37-2.jpg", description: "Vegetable stew with shrimp paste and assorted native vegetables." },
      { id: 24, title: "Inihaw na Liempo", category: "dinner", img: "https://panlasangpinoy.com/wp-content/uploads/2009/08/Grilled-Pork-Belly-Liempo.jpg", description: "Grilled marinated pork belly, a popular Filipino dinner dish." },
      { id: 25, title: "Bulalo", category: "dinner", img: "https://iankewks.com/wp-content/uploads/2025/01/IMG_3767.jpg", description: "Beef shank soup with bone marrow, corn, and vegetables." },
      
      // Dessert posts
      { id: 31, title: "Leche Flan", category: "dessert", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzQeby17cbNKiAxP0FczyCYjWhsm5JNWikkA&s", description: "Creamy caramel custard dessert." },
      { id: 32, title: "Halo-Halo", category: "dessert", img: "https://assets.bonappetit.com/photos/60e46c6701084801b06de2a3/1:1/w_2560%2Cc_limit/Halo-Halo-Recipe-2021.jpg", description: "Mixed shaved ice dessert with sweet beans, fruits, jellies, and leche flan." },
      { id: 33, title: "Bibingka", category: "dessert", img: "https://assets.unileversolutions.com/recipes-v2/110360.jpg", description: "Rice cake traditionally cooked in clay pots lined with banana leaves." },
      { id: 34, title: "Turon", category: "dessert", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6GObAVhm1Jfs29Pd0IQ5hjFSHKQKxD6svBQ&s", description: "Banana and jackfruit spring rolls fried to crispy perfection." },
      { id: 35, title: "Kutsinta", category: "dessert", img: "https://upload.wikimedia.org/wikipedia/commons/f/f2/Kutsinta.jpg", description: "Steamed sticky rice cake with a chewy texture, topped with grated coconut." }
    ];

    // Function to show categories view
    function showCategories() {
      document.getElementById('categoriesView').style.display = 'grid';
      document.getElementById('categoryPostsView').classList.remove('active');
    }

    // Function to show posts for a specific category
    function showCategoryPosts(category) {
      const categoryPosts = posts.filter(post => post.category === category);
      const categoryPostsContainer = document.getElementById('categoryPostsContainer');
      const currentCategoryTitle = document.getElementById('currentCategoryTitle');
      
      // Set category title
      const categoryNames = {
        'breakfast': 'Breakfast',
        'lunch': 'Lunch',
        'dinner': 'Dinner',
        'dessert': 'Dessert'
      };
      currentCategoryTitle.textContent = categoryNames[category];
      
      // Clear previous posts
      categoryPostsContainer.innerHTML = '';
      
      // Add posts to the container
      categoryPosts.forEach(post => {
        const postCard = document.createElement('div');
        postCard.className = 'postCard';
        postCard.innerHTML = `
          <div class="postImage">
            <img src="${post.img}" alt="${post.title}">
          </div>
          <div class="postContent">
            <h3 class="postTitle">${post.title}</h3>
            <p class="postDescription">${post.description}</p>
            <div class="postMeta">
              <span class="postCategory">${categoryNames[category]}</span>
              <span class="postDate">May 15, 2025</span>
            </div>
          </div>
        `;
        categoryPostsContainer.appendChild(postCard);
      });
      
      // Hide categories view and show posts view
      document.getElementById('categoriesView').style.display = 'none';
      document.getElementById('categoryPostsView').classList.add('active');
    }

    // Add click event listeners to category cards
    document.addEventListener('DOMContentLoaded', function() {
      const categoryCards = document.querySelectorAll('.categoryCard');
      categoryCards.forEach(card => {
        card.addEventListener('click', function() {
          const category = this.getAttribute('data-category');
          showCategoryPosts(category);
        });
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/gh/aFarkas/lazysizes@5.3.0/lazysizes.min.js" async></script>
</body>
</html>
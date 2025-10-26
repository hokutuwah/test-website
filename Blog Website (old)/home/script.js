const posts = [
  // Breakfast
  {
    id: 1,
    title: "Tapsilog",
    description: "A classic Filipino breakfast of tapa (cured beef), sinangag (garlic fried rice), and itlog (fried egg).",
    img: "https://thebakeologie.com/wp-content/uploads/2018/11/BeefTapa-1a.jpg",
    category: "breakfast",
    recipe: "50g thinly sliced beef tapa, 1/2 cup cooked rice, 1/2 clove garlic (minced), 1 teaspoon cooking oil, 1 small egg, salt and pepper to taste. Pan-fry the tapa until cooked through. Fry one egg. Sauté rice with garlic. Serve together.."
  },
  {
    id: 2,
    title: "Pandesal",
    description: "Soft, slightly sweet bread rolls often eaten at breakfast.",
    img: "https://makeitdough.com/wp-content/uploads/2023/01/Sourdough-Pandesal-18.jpg",
    category: "breakfast",
    recipe: "1/2 cup all-purpose flour, 1/4 teaspoon instant dry yeast, 1/4 teaspoon sugar, pinch of salt, 2 tablespoons warm milk, 1 teaspoon melted butter or oil, breadcrumbs. Combine milk and sugar, sprinkle yeast. Mix flour and salt. Combine wet and dry ingredients. Knead, let rise, shape, coat with breadcrumbs, bake at 350°F (175°C) for 12-15 minutes."
  },
  {
    id: 3,
    title: "Longsilog",
    description: "Filipino breakfast with sweet pork sausage (longganisa), garlic fried rice, and fried egg.",
    img: "https://urbanblisslife.com/wp-content/uploads/2023/01/Longsilog-FEATURE.jpg",
    category: "breakfast",
    recipe: "1-2 pieces small Filipino longganisa (about 40-50g), 1/2 cup cooked rice, 1/2 clove garlic (minced), 1 teaspoon cooking oil, 1 small egg. Pan-fry the longganisa. Fry one egg. Sauté rice with garlic. Serve together."
  },
  {
    id: 4,
    title: "Champorado",
    description: "Sweet chocolate rice porridge often eaten for breakfast.",
    img: "https://yummykitchentv.com/wp-content/uploads/2023/08/champorado-recipe.jpg",
    category: "breakfast",
    recipe: "1/4 cup glutinous rice, 1 cup water, 1 tablespoon unsweetened cocoa powder, 1-2 teaspoons sugar, optional: milk, flaked tuyo. Cook rice, water, and cocoa powder until thick. Sweeten. Serve hot, optionally with milk and/or tuyo."
  },
  {
    id: 5,
    title: "Tocilog",
    description: "Sweet cured pork (tocino) served with garlic fried rice and fried egg.",
    img: "https://lalunacafe.ph/storage/2022/08/Tocilog-1.jpg",
    category: "breakfast",
    recipe: "50g thinly sliced pork tocino, 1/2 cup cooked rice, 1/2 clove garlic (minced), 1 teaspoon cooking oil, 1 small egg. Pan-fry the tocino until caramelized. Fry one egg. Sauté rice with garlic. Serve together."
  },
  {
    id: 6,
    title: "Daing na Bangus",
    description: "Marinated milkfish fried until crispy, served with rice and egg.",
    img: "https://www.maggi.ph/sites/default/files/srh_recipes/733b9a75553d434a29c8bf53bfe293dd.jpg",
    category: "breakfast",
    recipe: "1 small piece of daing na bangus (about 80-100g), 1 teaspoon cooking oil, 1/2 cup cooked rice, optional: vinegar. Pan-fry the daing na bangus until crispy. Serve with rice and optional vinegar."
  },
  {
    id: 7,
    title: "Taho",
    description: "Sweet snack made of soft tofu, arnibal (sweet syrup), and sago pearls.",
    img: "https://upload.wikimedia.org/wikipedia/commons/7/7d/Taho2.jpg",
    category: "breakfast",
    recipe: "1 cup warm silken tofu, 2 tablespoons cooked sago pearls, 2-3 tablespoons arnibal. Layer tofu, sago, and arnibal. (Arnibal recipe: 1/4 cup brown sugar, 2 tablespoons water. Simmer until thickened)."
  },
  {
    id: 8,
    title: "Arroz Caldo",
    description: "Filipino rice porridge flavored with ginger and garnished with garlic, scallions, and boiled egg.",
    img: "https://panlasangpinoy.com/wp-content/uploads/2017/05/Chicken-Arroz-Caldo-2.jpg",
    category: "breakfast",
    recipe: "1/4 cup cooked rice, 1/2 cup chicken broth, 1/4 cup shredded cooked chicken, 1/2 teaspoon minced ginger, 1/4 teaspoon minced garlic, 1/4 teaspoon fish sauce, salt and pepper, optional toppings: scallions, fried garlic, hard-boiled egg. Simmer rice, broth, chicken, ginger, garlic, and fish sauce. Season. Garnish."
  },
  {
    id: 9,
    title: "Puto",
    description: "Steamed rice cakes often served with butter or cheese on top.",
    img: "https://theskinnypot.com/wp-content/uploads/2018/11/Puto-Cheese-500x375.jpg",
    category: "breakfast",
    recipe: "1/4 cup rice flour, 1 tablespoon sugar, pinch of baking powder, pinch of salt, 2-3 tablespoons water or milk. Mix ingredients. Steam for 10-15 minutes.."
  },
  {
    id: 10,
    title: "Kakanin",
    description: "Assorted Filipino sticky rice delicacies like biko, sapin-sapin, and kutsinta.",
    img: "https://cdn.sanity.io/images/f3knbc2s/production/08253a025ac131d304f32ead20e90560bee717d8-2500x1600.jpg",
    category: "breakfast",
    recipe: "1/4 cup cooked glutinous rice, 1/4 cup coconut milk, 1 tablespoon brown sugar, pinch of salt. Combine ingredients. Cook over low heat until thickened."
  },

  // Lunch
  {
    id: 11,
    title: "Pancit Canton",
    description: "Stir-fried egg noodles with vegetables, pork, shrimp, and soy sauce.",
    img: "https://www.maggi.ph/sites/default/files/styles/home_stage_944_531/public/srh_recipes/5b661360b8e49f5c2348c06858bb8f57.jpg?h=4f5b30f1&itok=doXJkNdF",
    category: "lunch",
    recipe: "50g pancit canton noodles, 1/4 cup sliced vegetables, 1 tablespoon sliced cooked pork or shrimp, 1/2 teaspoon soy sauce, 1/4 teaspoon oyster sauce (optional), pinch of black pepper, 1 teaspoon cooking oil, 1 tablespoon water or broth. Soak noodles. Stir-fry vegetables and meat. Add noodles, sauce, and pepper. Cook until liquid is absorbed. Serve hot."
  },
  {
    id: 12,
    title: "Lumpia",
    description: "Filipino spring rolls filled with savory meat and vegetables.",
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnO1UAVBoyrv1YtjlYJresLGUeCMNg1m2rng&s",
    category: "lunch",
    recipe: "2-3 lumpia wrappers, 1 tablespoon ground pork or beef, 1 teaspoon each chopped onion, carrot, water chestnuts (optional), 1/4 teaspoon soy sauce, salt and pepper, oil. Mix meat and vegetables. Fill wrappers, roll, and fry until golden brown."
  },
  {
    id: 13,
    title: "Adobo",
    description: "Iconic Filipino dish of chicken or pork stewed in vinegar, soy sauce, garlic, and spices.",
    img: "https://cdn.apartmenttherapy.info/image/upload/f_jpg,q_auto:eco,c_fill,g_auto,w_1500,ar_4:3/k%2FPhoto%2FRecipes%2F2024-04-filipino-adobo%2Ffilipino-adobo-426",
    category: "lunch",
    recipe: "50g chicken, 1 tablespoon each soy sauce and vinegar, 1 clove minced garlic, 1/2 bay leaf, 3-4 peppercorns, 1 teaspoon cooking oil, 1/4 cup water. Sauté garlic. Add chicken and cook. Add sauce and simmer until chicken is tender. Serve with rice."
  },
  {
    id: 14,
    title: "Gising-Gising",
    description: "Spicy chopped green beans in coconut milk with chili and ground meat.",
    img: "https://www.kawalingpinoy.com/wp-content/uploads/2015/01/gising-gising-bangus-5.jpg",
    category: "lunch",
    recipe: "1/4 cup minced green beans, 1 tablespoon ground pork, 1 tablespoon coconut milk, 1/4 small chopped onion, 1/2 clove minced garlic, 1/4 teaspoon chopped chili, 1/2 teaspoon cooking oil, salt and pepper. Sauté onion and garlic. Add pork, then beans and chili. Stir in coconut milk. Simmer until beans are tender. Serve with rice."
  },
  {
    id: 15,
    title: "Menudo",
    description: "Pork stew with tomato sauce, liver, potatoes, and carrots.",
    img: "https://www.kawalingpinoy.com/wp-content/uploads/2024/12/Filipino-menudo.jpg",
    category: "lunch",
    recipe: "50g diced pork, 1/4 small each diced potato and carrot, 1 tablespoon diced bell pepper, 1 tablespoon tomato sauce, 1/4 cup broth, 1/4 teaspoon soy sauce, 1-2 raisins (optional), tiny piece diced liver (optional), 1/2 clove minced garlic, 1/4 small chopped onion, 1/2 teaspoon cooking oil, salt and pepper. Sauté onion and garlic. Add pork, potato, and carrot. Add sauce and broth. Simmer until tender. Add bell pepper. Serve with rice."
  },
  {
    id: 16,
    title: "Bistek Tagalog",
    description: "Filipino beef steak marinated in soy sauce and calamansi, with onions.",
    img: "https://www.eatfigsnotpigs.com/wp-content/uploads/2022/07/Bistek-Tagalog-Beefsteak_1463.jpg",
    category: "lunch",
    recipe: "50g thinly sliced beef, 1 tablespoon soy sauce, 1 teaspoon calamansi juice, 1/2 clove minced garlic, pinch of pepper, 1/4 small onion (thinly sliced), 1 teaspoon cooking oil. Marinate beef. Pan-fry. Sauté onions. Add marinade, simmer. Serve beef with onions and sauce. Serve with rice."
  },
  {
    id: 17,
    title: "Caldereta",
    description: "Spicy beef stew with tomato sauce, potatoes, and bell peppers.",
    img: "https://gypsyplate.com/wp-content/uploads/2023/12/beef-caldereta_square.jpg",
    category: "lunch",
    recipe: "50g beef cubes, 1/4 small each diced potato and carrot, 1 tablespoon diced bell pepper, 1 tablespoon tomato sauce, 1/4 cup beef broth, 1-2 sliced green olives, tiny amount liver spread (optional), 1/2 clove minced garlic, 1/4 small chopped onion, 1/2 teaspoon cooking oil, salt and pepper. Sauté onion and garlic. Brown beef. Add potato and carrot. Add sauce and broth. Simmer until tender. Add bell pepper and olives. Serve with rice."
  },
  {
    id: 18,
    title: "Chicken Inasal",
    description: "Grilled chicken marinated in a mixture of calamansi, vinegar, garlic, and annatto oil.",
    img: "https://i0.wp.com/iankewks.com/wp-content/uploads/2022/06/IMG_4775-scaled.jpg?fit=1920%2C2560&ssl=1",
    category: "lunch",
    recipe: "1 small chicken thigh, 1 teaspoon vinegar, 1/2 teaspoon calamansi juice, 1/4 clove minced garlic, tiny pinch grated ginger and annatto powder, pinch of salt and pepper. Marinate chicken. Grill or bake until cooked through. Serve with rice."
  },
  {
    id: 19,
    title: "Laing",
    description: "Taro leaves cooked in coconut milk with chili and dried fish.",
    img: "https://kusinasecrets.com/wp-content/uploads/2024/11/u3317447599_httpss.mj_.runrzJY5AdW6LQ_top_down_view_of_Authent_136cae8e-1d96-4b4b-8417-693c972281cd_2.jpg",
    category: "lunch",
    recipe: "1/4 cup shredded taro leaves, 1/4 cup coconut milk, 1/4 small chopped onion, 1/4 clove minced garlic, tiny piece minced ginger, 1/4 teaspoon shrimp paste, small piece chili, pinch of salt. Simmer taro leaves, coconut milk, and aromatics until tender. Serve with rice."
  },
  {
    id: 20,
    title: "Paksiw na Lechon",
    description: "Leftover lechon simmered in vinegar, liver sauce, and spices.",
    img: "https://www.maggi.ph/sites/default/files/srh_recipes/dd46b1a21d79eba6b16c3946ed233723.jpg",
    category: "lunch",
    recipe: "50g leftover lechon (chopped), 1 tablespoon vinegar, 1 teaspoon liver sauce, 1/4 clove minced garlic, 1/4 cup water or broth, pinch of sugar (optional), 1-2 peppercorns. Simmer lechon in vinegar, liver sauce, garlic, and water until sauce thickens. Serve with rice."
  },

  // Dinner
  {
    id: 21,
    title: "Sinigang na Baboy",
    description: "Pork sour soup with tamarind broth and assorted vegetables.",
    img: "https://iankewks.com/wp-content/uploads/2024/10/IMG_8605-500x375.jpg",
    category: "dinner",
    recipe: "50g pork belly or shoulder, cut into small cubes 1/2 cup water or broth , 1 tablespoon tamarind paste (mix with a little hot water to extract the sourness) or 1 small tomato, quartered,1/4 small onion, quartered,1/2 clove garlic, crushed,1 small string bean, cut into 1-inch pieces,1 small slice of eggplant,1 small piece of radish, sliced,A small piece of taro (gabi), peeled and cubed (optional),Fish sauce (patis) to taste"
  },
  {
    id: 22,
    title: "Kare-Kare",
    description: "Oxtail stew in peanut sauce, served with bagoong (shrimp paste).",
    img: "https://www.foodies.ph/_recipeimage/267792/kare-kare-1-2x-1124.jpeg",
    category: "dinner",
    recipe: "50g oxtail, cut into small pieces,1/2 cup water or beef broth,1 tablespoon peanut butter (smooth),1/4 small eggplant, sliced,1 small string bean, cut into 1-inch pieces,1 small leaf of pechay or bok choy,1/4 small onion, chopped,1/2 clove garlic, minced,Tiny pinch of annatto powder (for color, optional),Salt to taste,Optional: A small amount of bagoong alamang for serving"
  },
  {
    id: 23,
    title: "Pinakbet",
    description: "Vegetable stew with shrimp paste and assorted native vegetables.",
    img: "https://curiousflavors.com/wp-content/uploads/2022/04/Untitled-design-37-2.jpg",
    category: "dinner",
    recipe: "This recipe includes 1 small slice of bitter melon (ampalaya), 1 small slice of eggplant, 1 small cube of squash, 1 to 2 pieces of okra, 1/4 of a small tomato (chopped), 1/4 of a small onion (chopped), 1/2 clove of garlic (minced), 1/4 teaspoon of shrimp paste (bagoong alamang), 1 tablespoon of water, and 1/4 teaspoon of cooking oil."
  },
  {
    id: 24,
    title: "Inihaw na Liempo",
    description: "Grilled marinated pork belly, a popular Filipino dinner dish.",
    img: "https://panlasangpinoy.com/wp-content/uploads/2009/08/Grilled-Pork-Belly-Liempo.jpg",
    category: "dinner",
    recipe: "80-100g pork belly (liempo) ,Marinade: 1 teaspoon soy sauce ,1/2 teaspoon vinegar ,1/4 clove garlic, minced ,Pinch of black peppe ,Tiny squeeze of calamansi or lemon juice (optional)"
  },
  {
    id: 25,
    title: "Bulalo",
    description: "Beef shank soup with bone marrow, corn, and vegetables.",
    img: "https://iankewks.com/wp-content/uploads/2025/01/IMG_3767.jpg",
    category: "dinner",
    recipe: "Boil beef shank and marrow bones until tender. Add corn, pechay, and other vegetables. Simmer until cooked."
  },
  {
    id: 26,
    title: "Batchoy",
    description: "Savory noodle soup with pork, liver, and crushed chicharron.",
    img: "https://panlasangpinoy.com/wp-content/uploads/2011/10/Batchoy-500x425.jpg",
    category: "dinner",
    recipe: "Prepare pork broth, add noodles, pork slices, liver, and chicharron. Garnish with garlic and scallions."
  },
  {
    id: 27,
    title: "Dinuguan",
    description: "Pork blood stew with vinegar and spices.",
    img: "https://images.yummy.ph/yummy/uploads/2018/01/dinuguan-1.jpg",
    category: "dinner",
    recipe: "Cook pork meat and organs, then simmer with pork blood, vinegar, and spices until thick and rich."
  },
  {
    id: 28,
    title: "Tinola",
    description: "Chicken ginger soup with green papaya and malunggay leaves.",
    img: "https://www.allrecipes.com/thmb/IW4iKHFxrQFmgfDX8CSzUHKIf5w=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/212929-chicken-tinola-ddmfs-step-5-26477ffd8f6944fbb37b7ed840ebd7c7.jpg",
    category: "dinner",
    recipe: "Simmer chicken in ginger broth with green papaya and malunggay leaves until tender."
  },
  {
    id: 29,
    title: "Binagoongan Baboy",
    description: "Pork cooked in shrimp paste with eggplant and chili.",
    img: "https://yummykitchentv.com/wp-content/uploads/2023/02/binagoongan-baboy.jpg",
    category: "dinner",
    recipe: "Sauté pork in shrimp paste, add eggplant and chili, and simmer until flavorful."
  },
  {
    id: 30,
    title: "Pochero",
    description: "Tomato-based stew with beef, plantains, vegetables, and chickpeas.",
    img: "https://panlasangpinoy.com/wp-content/uploads/2011/10/Pork-Pochero-500x375.jpg",
    category: "dinner",
    recipe: "Simmer beef with tomato sauce, add vegetables, saba bananas, and chickpeas. Cook until everything is tender."
  },

  // Dessert
  {
    id: 31,
    title: "Leche Flan",
    description: "Creamy caramel custard dessert.",
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzQeby17cbNKiAxP0FczyCYjWhsm5JNWikkA&s",
    category: "dessert",
    recipe: "For the caramel, combine 1 tablespoon of sugar with 1 teaspoon of water; for the custard, use 1 small egg yolk, 2 tablespoons of evaporated milk, 1 tablespoon of condensed milk, and a tiny drop of vanilla extract (optional)."
  },
  {
    id: 32,
    title: "Halo-Halo",
    description: "Mixed shaved ice dessert with sweet beans, fruits, jellies, and leche flan.",
    img: "https://assets.bonappetit.com/photos/60e46c6701084801b06de2a3/1:1/w_2560%2Cc_limit/Halo-Halo-Recipe-2021.jpg",
    category: "dessert",
    recipe: "2 tablespoons shaved ice, 1 teaspoon each of cooked sweet red beans, garbanzo beans, sweetened banana slices, jackfruit strips, coconut gel, ube halaya, 1 tablespoon evaporated milk, optional: leche flan, ice cream. Layer ingredients. Add ice, milk, and optional toppings. Mix before eating."
  },
  {
    id: 33,
    title: "Bibingka",
    description: "Rice cake traditionally cooked in clay pots lined with banana leaves.",
    img: "https://assets.unileversolutions.com/recipes-v2/110360.jpg",
    category: "dessert",
    recipe: "1/4 cup rice flour, 1 tablespoon glutinous rice flour, 1 tablespoon coconut milk, 1 teaspoon sugar, pinch baking powder and salt, 1 tablespoon water, optional: butter, sugar, grated coconut. Mix dry ingredients. Add wet ingredients. Bake at 350°F (175°C) for 15-20 minutes. Add toppings."
  },
  {
    id: 34,
    title: "Turon",
    description: "Banana and jackfruit spring rolls fried to crispy perfection.",
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6GObAVhm1Jfs29Pd0IQ5hjFSHKQKxD6svBQ&s",
    category: "dessert",
    recipe: "1/2 saba banana (sliced), small strip jackfruit (optional), 1 lumpia wrapper, 1/2 teaspoon brown sugar, oil. Wrap banana and jackfruit in wrapper. Sprinkle with sugar. Fry until golden brown."
  },
  {
    id: 35,
    title: "Kutsinta",
    description: "Steamed sticky rice cake with a chewy texture, topped with grated coconut.",
    img: "https://upload.wikimedia.org/wikipedia/commons/f/f2/Kutsinta.jpg",
    category: "dessert",
    recipe: "2 tablespoons rice flour, 1 teaspoon all-purpose flour, 1 teaspoon sugar, tiny drop lye water, tiny pinch annatto powder, 2-3 tablespoons water, grated coconut. Mix ingredients. Steam for 15-20 minutes. Top with coconut."
  },
  {
    id: 36,
    title: "Ube Halaya",
    description: "Sweet purple yam jam served as a dessert or topping.",
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwMVwnWuFHobLwsJbJHBVDcWjbNzPh_iY7Mg&s",
    category: "dessert",
    recipe: "1/4 cup mashed cooked ube, 1 tablespoon coconut milk, 1 teaspoon condensed milk, 1/4 teaspoon butter. Cook ube, coconut milk, and condensed milk until thick. Stir in butter."
  },
  {
    id: 37,
    title: "Buko Pie",
    description: "Young coconut pie with creamy filling in a flaky crust.",
    img: "https://upload.wikimedia.org/wikipedia/commons/0/0f/Buko-pie.jpg",
    category: "dessert",
    recipe: "Prepare a flaky pie crust, fill with sweet young coconut filling, and bake until golden brown."
  },
  {
    id: 38,
    title: "Cassava Cake",
    description: "Baked cassava cake with coconut milk, eggs, and condensed milk.",
    img: "https://mastersofkitchen.com/wp-content/uploads/2024/03/Cassava-Cake-with-Macapuno-recipe.jpg",
    category: "dessert",
    recipe: "Mix grated cassava, coconut milk, condensed milk, and eggs. Bake until set and top with coconut cream."
  },
  {
    id: 39,
    title: "Maja Blanca",
    description: "Coconut milk pudding with corn kernels, topped with latik.",
    img: "https://www.kawalingpinoy.com/wp-content/uploads/2018/11/creamy-maja-blanca-1.jpg",
    category: "dessert",
    recipe: "Cook coconut milk, cornstarch, sugar, and corn until thickened. Pour into molds and top with latik."
  },
  {
    id: 40,
    title: "Sans Rival",
    description: "Rich dessert cake with layers of buttercream, meringue, and cashews.",
    img: "https://salu-salo.com/wp-content/uploads/2021/12/Sans-Rival-2.jpg",
    category: "dessert",
    recipe: "Layer meringue discs with buttercream and chopped cashews. Chill before serving."
  }
];


  



const categoryButtons = document.querySelectorAll("#categoryFilters button");
const postsContainer = document.getElementById("postsContainer");
const postsSection = document.getElementById("postsSection");
const aboutSection = document.getElementById("aboutSection");
const contactSection = document.getElementById("contactSection");

const contactForm = document.getElementById("contactForm");


function renderPosts(postsToRender) {
  postsContainer.innerHTML = "";

  if (postsToRender.length === 0) {
    postsContainer.innerHTML = `<p>No recipes found.</p>`;
    return;
  }

  postsToRender.forEach((post, index) => {
    const postCard = document.createElement("article");
    postCard.classList.add("post-card");
    postCard.style.animationDelay = `${index * 0.1}s`;

    postCard.innerHTML = `
      <img src="${post.img}" alt="${post.title}" />
      <h3>${post.title}</h3>
      <p>${post.description}</p>
      <details>
        <summary>View Recipe</summary>
        <p>${post.recipe}</p>
      </details>
    `;

    postsContainer.appendChild(postCard);
  });
}


function filterPosts(category) {
  


  if (category === "all") {
    renderPosts(posts);
    postsSection.style.display = "block";
    aboutSection.classList.add("hidden");
    contactSection.classList.add("hidden");
  } else if (category === "about") {
    postsSection.style.display = "none";
    aboutSection.classList.remove("hidden");
    contactSection.classList.add("hidden");
  } else if (category === "contact") {
    postsSection.style.display = "none";
    aboutSection.classList.add("hidden");
    contactSection.classList.remove("hidden");
  } else {
    const filtered = posts.filter((post) => post.category === category);
    renderPosts(filtered);
    postsSection.style.display = "block";
    aboutSection.classList.add("hidden");
    contactSection.classList.add("hidden");
  }
}


categoryButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    
    categoryButtons.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    const selectedCategory = btn.getAttribute("data-category");
    filterPosts(selectedCategory);

    
  });
});



contactForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const name = contactForm.name.value.trim();
  const email = contactForm.email.value.trim();
  const message = contactForm.message.value.trim();

  if (!name || !email || !message) {
    alert("Please fill in all fields.");
    return;
  }

  alert(`Thank you, ${name}! Your message has been received.`);
  contactForm.reset();
});


renderPosts(posts);

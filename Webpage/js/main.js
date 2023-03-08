/// Article slider
// Get the slider container element
const slider = document.querySelector('.slider');

// Get all slider item elements
const slides = document.querySelectorAll('.slide');

// Set a variable to keep track of the current slide index
let currentIndex = 0;

// Create a function to move to the next slide
function nextSlide() {
// Hide the current slide
    slides[currentIndex].classList.remove('active');

// Increment the current index
    currentIndex++;

// If the current index is greater than the number of slides, reset it to 0
    if (currentIndex >= slides.length) {
        currentIndex = 0;
    }

// Show the new current slide
    slides[currentIndex].classList.add('active');

}

// Set an interval to automatically switch to the next slide every 5 seconds
setInterval(nextSlide, 5000);

// Latest news
// Get the container element for the latest news section
const latestNews = document.querySelector('.latest-news');

// Get all news article elements
const articles = document.querySelectorAll('.article');

// Convert the articles NodeList to an array so we can use array methods
const articlesArray = Array.from(articles);

// Sort the articles array by date
articlesArray.sort((a, b) => {
    return new Date(b.dataset.date) - new Date(a.dataset.date);
});

// Loop through the sorted articles array and append each article to the latest news container
articlesArray.forEach(article => {
    latestNews.appendChild(article);
});

// News categories
// Get the container element for the news categories section
const newsCategories = document.querySelector('.news-categories');

// Get all news article elements with a data-category attribute
const categoryArticles = document.querySelectorAll('.article[data-category]');

// Loop through each category article and create a button element for its category
categoryArticles.forEach(article => {
// Get the category of the current article
    const category = article.dataset.category;

// Check if a button element for this category already exists
    const existingButton = newsCategories.querySelector(`button[data-category="${category}"]`);

    if (existingButton) {
        // If a button element already exists, append the article to its corresponding list
        const categoryList = existingButton.nextElementSibling;
        categoryList.appendChild(article);
    } else {
        // If a button element doesn't exist, create one and append it to the news categories container
        const button = document.createElement('button');
        button.textContent = category;
        button.dataset.category = category;
        newsCategories.appendChild(button);

        // Create a new list element for this category and append the current article to it
        const categoryList = document.createElement('ul');
        categoryList.appendChild(article);
        newsCategories.appendChild(categoryList);

        // Add a click event listener to the button to show/hide the corresponding category list
        button.addEventListener('click', () => {
            categoryList.classList.toggle('active');
        });
    }

});

// Search bar
// Get the search input element
const searchInput = document.querySelector('#search');

// Get all news article elements with a data-title attribute
const titleArticles = document.querySelectorAll('.article[data-title]');

// Add a keyup event listener to the search input
searchInput.addEventListener('keyup', () => {
// Get the search query from the input value
    const searchQuery = searchInput.value.trim().toLowerCase();
// Loop through each title article and check if its title contains the search query
    titleArticles.forEach(article => {
        const title = article.dataset.title.toLowerCase();
        if (title.includes(searchQuery)) {
// If the article title contains the search query, show it
            article.classList.remove('hidden');
        } else {

// If the article title does not contain the search query, hide it by adding the 'hidden' class
            article.classList.add('hidden');
        }
    });
});


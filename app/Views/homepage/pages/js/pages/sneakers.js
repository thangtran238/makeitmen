const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');
const searchResults = document.querySelector('.search-results');

searchResults.style.display = 'none';
searchInput.addEventListener('input', function() {
  const searchText = searchInput.value.trim();
  if (searchText.length > 0) {
    performSearch(searchText);
    searchResults.style.display = 'block';
  } else {
    clearResults();
    searchResults.style.display = 'none';
  }
});

searchForm.addEventListener('submit', function(event) {
  event.preventDefault();
});

function performSearch(searchText) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/project/makeitman/app/Views/homepage/pages/php/sneakers.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = xhr.responseText;
      displayResults(response);
    } else {
      clearResults();
    }
  };
  const data = 'searchInput=' + encodeURIComponent(searchText);
  xhr.send(data);
}

function displayResults(response) {
  const resultsContainer = document.getElementById('resultsContainer');
  resultsContainer.innerHTML = response;
}

function clearResults() {
  const resultsContainer = document.getElementById('resultsContainer');
  resultsContainer.innerHTML = '';
}



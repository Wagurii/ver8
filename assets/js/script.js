function fetchPosts(){
  fetch('fetch/fetch_post.php')
  .then(response => response.json())  
  .then(posts => {
    const postsContainer = document.getElementById('postsContainer');
    postsContainer.innerHTML = '';           
    posts.forEach(post => {
        const postElement = document.createElement('div');
        postElement.classList.add('post');

        let imageHTML = '';
        if (post.images && post.images.trim() !== '') {
            imageHTML =     
            `<img data-aos="zoom-in" src="uploads/${post.images}" alt="Post Image" style="max-width: 100%; height: auto;">`;
        }
        let buttonsHTML = '';
        if (currentUserId && post.user_id == currentUserId) {
            // Use a dropdown menu with 3 dots (Bootstrap)
            buttonsHTML = `
              <div class="dropdown post-options">
                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton${post.post_id}" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${post.post_id}">
                  <li><a class="dropdown-item" href="#" onclick="editPost(${post.post_id}, \`${post.post_content.replace(/`/g, '\\`')}\`)">Edit</a></li>
                  <li><a class="dropdown-item text-danger" href="#" onclick="deletePost(${post.post_id})">Delete</a></li>
                </ul>
              </div>
            `;
        }
        postElement.innerHTML = `
          <div class="post-container">
            <div class="post-header">
              <div class="profile-pic"></div>
              <div class="user-info">
                ${buttonsHTML}
                <p class="username">${post.username.charAt(0).toUpperCase() + post.username.slice(1)}</p>
                <p class="post-time">${new Date(post.created_at).toLocaleString()}</p>
              </div>
            </div>
            <div class="post-content">
              ${post.post_content}
            </div>
            ${imageHTML}
                          <span>Comment</span>

          </div>
        `;  
        postsContainer.appendChild(postElement);
    });
  }).catch(error => console.error('Error:', error));
}
fetchPosts();
function deletePost(postId) {
    
  if (confirm('Are you sure you want to delete this post?')) {
      fetch('function/delete.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify({ post_id: postId }),
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              console.log(data.success);
              fetchPosts(); 
          } else {
              alert('Error deleting post: ' + data.error);
          }
      })
      .catch(error => console.error('Error:', error));
  }
}

function editPost(postId, postContent) {
    if (confirm('Are you sure you want to edit this post?')) {
        const newContent = prompt("Edit post content:", postContent);
        if (newContent === null) return; 

        fetch('function/edit.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ post_id: postId, post_content: newContent }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                fetchPosts(); 
                console.log(data.success)
            } else {
                alert('Error editing post: ' + data.error);
            }
        })
        .catch(error => console.error('Error:', error));

        
    }
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Post</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        
        .post-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            padding: 12px 16px;
        }
        
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            background-color: #e4e6eb;
        }
        
        .user-info {
            flex-grow: 1;
        }
        
        .username {
            font-weight: 600;
            margin: 0;
            font-size: 15px;
        }
        
        .post-time {
            color: #65676b;
            font-size: 13px;
            margin: 0;
        }
        
        .post-content {
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 1.4;
        }
        
        .post-actions {
            display: flex;
            border-top: 1px solid #dddfe2;
            padding-top: 8px;
            color: #65676b;
        }
        
        .action {
            display: flex;
            align-items: center;
            margin-right: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        
        .action:hover {
            text-decoration: underline;
        }
        
        .action svg {
            margin-right: 6px;
            width: 18px;
            height: 18px;
        }
        
        .comment-count {
            font-weight: 600;
        }
        
        .create-post {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto 20px;
            padding: 12px 16px;
        }
        
        .create-post-header {
            font-weight: 600;
            margin-bottom: 10px;
            color: #050505;
        }
        
        .post-input {
            width: 100%;
            border: none;
            background-color: #f0f2f5;
            border-radius: 20px;
            padding: 10px 15px;
            font-size: 15px;
            resize: none;
            margin-bottom: 10px;
        }
        
        .post-button {
            background-color: #1b74e4;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            font-weight: 600;
            cursor: pointer;
            float: right;
        }
        
        .post-button:hover {
            background-color: #166fe5;
        }
    </style>
</head>
<body>
    <div class="create-post">
        <div class="create-post-header">Want to post something?</div>
        <textarea class="post-input" placeholder="What's on your mind?"></textarea>
        <button class="post-button">Post</button>
        <div style="clear: both;"></div>
    </div>
    
    <div class="post-container">
        <div class="post-header">
            <div class="profile-pic"></div>
            <div class="user-info">
                <p class="username">Angel Samson</p>
                <p class="post-time">Just now</p>
            </div>
        </div>
        
        <div class="post-content">
            Guy's looks hotkin n'yo diogod ko?
        </div>
        
        <div class="post-actions">
            <div class="action">
                <svg viewBox="0 0 24 24" fill="#65676b">
                    <path d="M18.77 11h-4.23l1.52-4.94C16.38 5.03 15.54 4 14.38 4c-.58 0-1.14.24-1.52.65L7 11H3v10h14.43c1.06 0 1.98-.73 2.19-1.77l1.34-6c.23-1.05-.4-2.08-1.44-2.23zM7 20H4v-8h3v8zm12.98-6.83l-1.34 6c-.1.47-.51.83-1 .83H8v-8.61l5.6-6.06c.19-.21.48-.33.78-.33.26 0 .5.11.63.3.12.17.15.38.09.57L13 13h4.6c.31 0 .6.21.64.52.03.26-.1.51-.32.65z"></path>
                </svg>
                Like
            </div>
            <div class="action">
                <svg viewBox="0 0 24 24" fill="#65676b">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path>
                </svg>
                Comment
            </div>
            <div class="comment-count">2.4k</div>
        </div>
    </div>

    <script>
        document.querySelector('.post-button').addEventListener('click', function() {
            const postContent = document.querySelector('.post-input').value.trim();
            if (postContent) {
                // In a real app, you would send this to your server
                alert('Post created: ' + postContent);
                document.querySelector('.post-input').value = '';
            }
        });
        
        // Like button functionality
        document.querySelector('.action').addEventListener('click', function() {
            this.classList.toggle('liked');
            if (this.classList.contains('liked')) {
                this.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="#1877f2">
                        <path d="M18.77 11h-4.23l1.52-4.94C16.38 5.03 15.54 4 14.38 4c-.58 0-1.14.24-1.52.65L7 11H3v10h14.43c1.06 0 1.98-.73 2.19-1.77l1.34-6c.23-1.05-.4-2.08-1.44-2.23zM7 20H4v-8h3v8zm12.98-6.83l-1.34 6c-.1.47-.51.83-1 .83H8v-8.61l5.6-6.06c.19-.21.48-.33.78-.33.26 0 .5.11.63.3.12.17.15.38.09.57L13 13h4.6c.31 0 .6.21.64.52.03.26-.1.51-.32.65z"></path>
                    </svg>
                    Liked
                `;
            } else {
                this.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="#65676b">
                        <path d="M18.77 11h-4.23l1.52-4.94C16.38 5.03 15.54 4 14.38 4c-.58 0-1.14.24-1.52.65L7 11H3v10h14.43c1.06 0 1.98-.73 2.19-1.77l1.34-6c.23-1.05-.4-2.08-1.44-2.23zM7 20H4v-8h3v8zm12.98-6.83l-1.34 6c-.1.47-.51.83-1 .83H8v-8.61l5.6-6.06c.19-.21.48-.33.78-.33.26 0 .5.11.63.3.12.17.15.38.09.57L13 13h4.6c.31 0 .6.21.64.52.03.26-.1.51-.32.65z"></path>
                    </svg>
                    Like
                `;
            }
        });
    </script>
</body>
</html>
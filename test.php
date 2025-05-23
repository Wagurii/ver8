<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Social Post</title>
    <link href="styles.css" rel="stylesheet" />
  </head>
  <style>
    /* Base Styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f3f4f6;
  margin: 0;
  padding: 0;
}

.bg-gray-50 {
  background-color: #f9fafb;
}

.max-w-xl {
  max-width: 36rem;
}

.w-full {
  width: 100%;
}

.text-lg {
  font-size: 1.125rem;
}

.font-semibold {
  font-weight: 600;
}

.bg-gray-100 {
  background-color: #f3f4f6;
}

.rounded-full {
  border-radius: 9999px;
}

.px-6 {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}

.py-3 {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
}

.inline-block {
  display: inline-block;
}

.mb-6 {
  margin-bottom: 1.5rem;
}

.w-10 {
  width: 2.5rem;
}

.h-10 {
  height: 2.5rem;
}

.bg-gray-200 {
  background-color: #e5e7eb;
}

.flex {
  display: flex;
}

.items-center {
  align-items: center;
}

.space-x-3 {
  gap: 0.75rem;
}

.mb-4 {
  margin-bottom: 1rem;
}

.text-gray-700 {
  color: #374151;
}

.grid {
  display: grid;
}

.grid-cols-2 {
  grid-template-columns: repeat(2, minmax(0, 1fr));
}

.gap-4 {
  gap: 1rem;
}

.aspect-square {
  aspect-ratio: 1 / 1;
}

.bg-gray-200 {
  background-color: #e5e7eb;
}

.rounded-lg {
  border-radius: 0.5rem;
}

.overflow-hidden {
  overflow: hidden;
}

.text-gray-500 {
  color: #6b7280;
}

.text-sm {
  font-size: 0.875rem;
}

.mr-1 {
  margin-right: 0.25rem;
}

.create-post-button {
  background-color: #4f46e5;
  color: white;
  padding: 0.5rem 1.5rem;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.create-post-button:hover {
  background-color: #4338ca;
}

.post-card {
  background-color: white;
  border-radius: 1rem;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  padding: 1.5rem;
  transition: all 0.3s ease;
}

.post-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

  </style>
  <body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-xl w-full">
      <div class="post-card">
        <div class="text-lg font-semibold bg-gray-100 rounded-full px-6 py-3 inline-block mb-6">
          Want to post something?
        </div>

        <div class="flex items-center space-x-3 mb-4">
          <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
            <i class="ri-user-line text-gray-600"></i>
          </div>
          <span class="font-medium">Angel Samson</span>
        </div>

        <div class="mb-4">
          <p class="text-gray-700">Guyt baka Nasha niya alagad ko?</p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden">
            <img
              src="https://public.readdy.ai/ai/img_res/88a7eebcbc5d72d707ec187f6b983ce9.jpg"
              class="w-full h-full object-cover"
              alt="Post image 1"
            />
          </div>
          <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden">
            <img
              src="https://public.readdy.ai/ai/img_res/69f5b1161465d91dcff7ff79559887f8.jpg"
              class="w-full h-full object-cover"
              alt="Post image 2"
            />
          </div>
        </div>

        <div class="flex items-center text-gray-500 text-sm">
          <i class="ri-chat-1-line mr-1"></i>
          <span>Comment : 2.4k</span>
        </div>
      </div>
      <div class="mt-4 flex justify-center">
        <button
          class="create-post-button"
        >
          Create Post
        </button>
      </div>
    </div>

    <script>
        document.querySelector(".post-card").addEventListener("click", () => {
  const card = document.querySelector(".post-card");
  card.style.transform = "scale(0.98)";
  setTimeout(() => {
    card.style.transform = "scale(1)";
  }, 100);
});

    </script>
  </body>
</html>

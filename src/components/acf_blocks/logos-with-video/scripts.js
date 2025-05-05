// JavaScript code for acf_blocks/logos-with-video component
(($) => {

     "use strict";
     document.addEventListener('DOMContentLoaded', () => {
          const wrapper = document.querySelector('.video-wrapper');
          const playBtn = wrapper.querySelector('.video-play-btn');
        
          playBtn.addEventListener('click', (e) => {
            e.preventDefault();
        
            // Build the YouTube iframe
            const iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/lLJbHHeFSsE?si=KU_7MkYfuauWKU5t';
            iframe.allow =
              'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
            iframe.allowFullscreen = true;
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.border = '0';
        
            // Replace thumbnail + button with the iframe
            wrapper.innerHTML = '';
            wrapper.appendChild(iframe);
          });
        });
})(jQuery);
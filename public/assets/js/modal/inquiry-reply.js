
       document.querySelectorAll('.delete-inquiry').forEach(item => {
         item.addEventListener('click', e => {
           e.preventDefault();
               document.getElementById("inquiryId").value = item.dataset.inquiry_id;
           })
       });
       document.querySelectorAll('.delete-reply').forEach(item => {
         item.addEventListener('click', e => {
           e.preventDefault();
               document.getElementById("replyId").value = item.dataset.reply_id;
           })
       });
       document.querySelectorAll('.edit-inquiry').forEach(item => {
         item.addEventListener('click', e => {
           e.preventDefault();
           document.getElementById("inquiryIdEdit").value = item.dataset.inquiry_id;
           document.getElementById("inquiryContentEdit").value = item.dataset.inquiry_content;
           })              
       });
       document.querySelectorAll('.edit-reply').forEach(item => {
        item.addEventListener('click', e => {
          e.preventDefault();
          document.getElementById("replyIdEdit").value = item.dataset.reply_id;
          document.getElementById("replyContentEdit").value = item.dataset.reply_content;
          }) 
        });
      


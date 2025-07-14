 // Get DOM Elements

 const modal = document.querySelector('#my-modal');
//  const modalBtn = document.querySelector('#modal-btn');
 const closeBtn = document.querySelector('.close');
 const reload = document.querySelector('#reload');
 

 
 // Events
 addEventListener("load",openModal);
//  modalBtn.addEventListener('click', openModal);
 closeBtn.addEventListener('click', closeModal);
//  window.addEventListener('click', outsideClick);
 
 // Open
 function openModal() {
   modal.style.display = 'block';
 }
 

 // Close
 function closeModal() {
   modal.style.display = 'none';
   window.close();
 }
 
 
//Close If Outside Click
//  function outsideClick(e) {
//    if (e.target == modal ) {
// 	 modal.style.display = 'none';
// 	 reload.style.display="block";
// 	//  window.close();
//    }
//  }




  $('#addcommentForm').on('submit', function(e) {
	e.preventDefault();
	var data = new FormData($(this)[0]);
	data.append('action', 'addcomment');
	var form = $(this);
	form.find(':submit').attr('disabled', true);
	var url = "config.php";
	$.ajax({
	  type: 'POST',
	  url: url,
	  data: data,
	  dataType: 'JSON',
	  processData: false,
	  contentType: false,
	  error: function(xhr, textStatus, errorThrown) {
		console.log(xhr.responseText);
	  },
	  success: function(response) {
		console.log(response);
		form.find(':submit').attr('disabled', false);
		if (response.error_status == 1) {
		  form.find('small').text('');
		  // If validation error exists
		  for (var key in response) {
			var errorContainer = form.find(`#${key}Error`);
			if (errorContainer.length !== 0) {
			  errorContainer.html(response[key]);
			}
		  }
		}
		if (response.status == 1) {
		  form.trigger('reset');
		  form.find('small').text('');
		  // handling success respone
		  // window.location.href = 'login.php';
		  alert("تمت إضافة التعليق بنجاح");
		  console.login(response.msg);

		} else if (response.status == 0) {
		  // Handling failure response
		  console.login(response.msg);
		}
	  }
	});
  });
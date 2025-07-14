 //edit tank
 const edit = document.querySelectorAll('.edit');
//  console.log(edit);
 document.querySelectorAll('.edit').forEach(item => {
     item.addEventListener('click', e => {
        console.log(item.dataset.title);
        $('#topicId').val(item.dataset.id);
        $('#title_topic').val(item.dataset.title);
        $('#description_topic').val(item.dataset.description);
        $('#update-topics').modal('show');
     })
 })
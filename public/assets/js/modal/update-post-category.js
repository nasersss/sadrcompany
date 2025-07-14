//edit tank
const edit = document.querySelectorAll('.edit');
//  console.log(edit);
document.querySelectorAll('.edit').forEach(item => {
    item.addEventListener('click', e => {
        console.log(item.dataset.name);
        $('#categoryId').val(item.dataset.id);
        $('#ar_name_category').val(item.dataset.ar_name);
        $('#en_name_category').val(item.dataset.en_name);
        $('#update-postCategories').modal('show');
    })
})

document.querySelectorAll('.edit-setting').forEach(item => {
    item.addEventListener('click', e => {
      e.preventDefault();
      document.getElementById("settingId").value = item.dataset.id;
    //   document.getElementById("settingKey").value = item.dataset.key;
      document.getElementById("settingValue").value = item.dataset.value;
    })
  });

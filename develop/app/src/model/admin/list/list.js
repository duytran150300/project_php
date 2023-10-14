function selectedCategory() {
  let checkboxes = document.getElementsByName("delete_check");
  const deleteButtonCategories = document.querySelector(".delete_all_category");

  function updateDeleteButton() {
    let checkedCount = document.querySelectorAll(
      'input[name="delete_check"]:checked'
    ).length;
    console.log(checkedCount);

    if (document.querySelector(".check_all").checked || checkedCount >= 2) {
      deleteButtonCategories.style.display = "block";
    } else {
      deleteButtonCategories.style.display = "none";
    }
  }

  document.querySelector(".check_all").addEventListener("change", function () {
    for (let i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = this.checked;
    }
    updateDeleteButton();
  });

  for (let i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", function () {
      updateDeleteButton();
    });
  }

  updateDeleteButton();
}
selectedCategory();

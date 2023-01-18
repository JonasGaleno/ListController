function openCategory(id)
{
    window.location.href = `/category-items?id=${id}`;
}

function fillForm(id, description)
{
    console.log(description);
    document.getElementById("editItemForm").action = `/edit-item?id=${id}`;
    document.getElementById("inputDescriptionItem").value = description;
}

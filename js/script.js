// const $formElem = $(`.js-form`);
// // const $inputPictureElem = $(`.js-input-pictures`);
// // const $uploadBtn = $(`.js-upload`);
// console.log($formElem);
// $($formElem).on(`submit`, function (event) {
//   event.preventDefault();

//   // const fileData = $($inputPictureElem).prop("files")[0];
//   let formData = new FormData($formElem);
  
//   // formData.append("userPictures", fileData);
//   $.ajax({
//       url: "/route/gallery/",
//       dataType: 'script',
//       cache: false,
//       contentType: false,
//       processData: false,
//       data: formData,                         
//       type: 'POST',
//       success: function(){
//           console.log("works"); 
//       }
//   });
// });

const URL = '/src/gallery_create.php';
const $formElem = document.querySelector(`.js-form`);

$formElem.onsubmit = async (event) => {
  event.preventDefault();

  const formData = new FormData($formElem);

  let response = await fetch(URL, {
    method: 'POST',
    body: formData
  });

  if (response.ok) {
    let json = await response.json();
    console.log(json);
  } else {
    console.log("Ошибка HTTP: " + response.status);
  }

};
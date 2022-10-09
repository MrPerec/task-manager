`use strict`;

function upload(url, data) {
  return $.ajax({
    url: url,
    type: 'POST',
    data: data,
    processData: false,
    contentType: false,
    dataType: `json`,
    error: (xhr, ajaxOptions) => alert(`${ajaxOptions} ${xhr.status} ${xhr.statusText}`),
    success: (data) => data,
  });
}

const $formElem = $(`.js-form`);
const $contentElem = $(`.js-content`);

$($formElem).on(`submit`, function (event) {
  event.preventDefault();

  const URL = '/src/gallery_create.php';
  const formData = new FormData($formElem[0]);

  upload(URL, formData).then((response) => {
    response.forEach(({ loaded, message, fileName, filePath }) => {
      const textStyle = loaded ? `text_success` : `text_error`;
      const $newMessageElem = $(`<b class="${textStyle}">${message}</b>`);

      $($formElem).after($newMessageElem);

      if (loaded) {
        const $newPictureElem = $(`
          <figure class="text-center">
            <p><img src="${filePath}" alt="${fileName}" /></p>
            <figcaption>${fileName}</figcaption>
          </figure>
        `);

        $($contentElem).append($newPictureElem);
      }
    });
  });
});

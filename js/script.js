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

function convertFileSize(bytes) {
  const TEN_KB = 10240;
  const ONE_MB = 1048576;

  if (bytes < TEN_KB) return `${bytes} b`;
  if (TEN_KB < bytes && bytes < ONE_MB) return `${(bytes/1024).toFixed(2)} Kb`;
  if (bytes > ONE_MB) return `${(bytes/1024/1024).toFixed(2)} Mb`;
}

let $newMessageElem = (style, text) => $(`<b class="${style}">${text}</b>`);
let $newPictureElem = (path, name, time, id, size) => $(
  `<figure class="text-center">
    <p><img src="${path}" alt="${name}" /></p>
    <figcaption>${name}</figcaption>
    <span>Дата загрузки: ${time}</span>
    <br>
    <span>Размер: ${size}</span>
    <div class="form-check-del-this">
      <input type="checkbox" id="${id}" name="delPicturesArr[${id}]" value="${name}">
      <label class="form-check-del-this__label" for="${id}">Удалить</label>
    </div>
  </figure>`
)

const $formElem = $(`.js-form`);
const $contentElem = $(`.js-content`);

$($formElem).on(`submit`, function (event) {
  event.preventDefault();

  const URL = '/src/gallery_create.php';
  const formData = new FormData($formElem[0]);

  upload(URL, formData).then((response) => {
    let key = 0;

    response.forEach(({ loaded, message, fileName, uploadTime, filePath, fileSize }) => {
      const className = loaded ? `text_success` : `text_error`;

      $($formElem).after().append($newMessageElem(className, message));

      if (loaded) {
        $($contentElem).append($newPictureElem(filePath, fileName, uploadTime, key, convertFileSize(fileSize)));
        key++;
      }
    });
  });
});

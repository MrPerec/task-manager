<?php


?>

<form action="?add_post=yes" name="add_post" method="post">
  <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="iat">
          <label for="text_title">Заголовок:</label>
          <input id="text_title" size="30" name="text_title" value="">
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="text_body">Текст сообщения:</label>
          <input id="text_body" size="30" name="text_body" value="">
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="to_user">Пользователь:</label>
          <select id="to_user" name="to_user" value="">
            <option disabled>Выберите героя</option>
            <option value="Чебурашка">Чебурашка</option>
            <option selected value="Крокодил Гена">Крокодил Гена</option>
            <option value="Шапокляк">Шапокляк</option>
            <option value="Крыса Лариса">Крыса Лариса</option>
          </select>
      </td>
    </tr>
    <tr>
      <td class="iat">
          <label for="message_section">Раздел сообщения:</label>
          <input id="message_section" size="30" name="message_section" required value="">
      </td>
    </tr>
    <tr>
        <td><input type="submit" value="Отправить"></td>
    </tr>
  </table>
</form>
</td>
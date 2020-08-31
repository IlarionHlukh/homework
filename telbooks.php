<?php

    const USERS_FILE = 'book.json';

function showTableForm()
{
    $html  = '
<div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Форма для внесення контактних даних</h4>
          </div>
          <div class="card-body">
                <form action="" method="POST">
        <br><input type="text" name="name" placeholder="Ваше імя">
        <br><input type="text" name="phone" placeholder="Телефон"></br>
            <br><input type="submit" formaction="/?action=create" class="btn btn-success" name="Submit" value ="Добавити">
            <input type="submit" formaction="/?action=delete" class="btn btn-danger" name="deleteItem" value="Видалити запис" />
            </form>
</div>
</div>';

    echo $html;
}
        function showContactBook()
        {
            $html = '
<div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
          <h4 class="my-0 font-weight-normal">Телефона книга</h4>
          </div>
          <div class="card-body">
    <table border="1">
    <table mt-20>
          <style>
              table {
                  width: 700px; 
                  border: 5px darkslateblue; 
                  margin: auto; 
                  vertical-align: middle;
              }
              th {
                  border: 2px solid darkorange;
                  text-align: center; 
                  background-color: chocolate;
              }
              td {
                  border: 2px solid darkorange; 
                  text-align: center; 
              }
          </style>
    <thead>
        <th>Імя</th>    
        <th>Телефон</th>   
    </thead>
    <tbody>
  ';

            foreach (getContacts() as $contact) {
                $html .= "<tr><td>{$contact['name']}</td><td>{$contact['phone']}</td></tr>";
            }

            $html .= '</tbody></table>';

            echo $html;
        }

        function getContacts(): array
        {
            $jsonString = file_get_contents(USERS_FILE);
            return json_decode($jsonString, true) ?? [];
        }

        function createContact(string $name, string $phone) {
            $users = getContacts();
            $users[] = [
                'name' => $name,
                'phone' => $phone
            ];
            writeUsersToFile($users);
            header("Location: /");
        }

        function writeUsersToFile(array $users)
        {
            $json=json_encode($users);

            file_put_contents(USERS_FILE, $json);
        }

    function getContactsBooks(): array
    {
        $delete_jsonString = file_get_contents(USERS_FILE);
        return json_decode($delete_jsonString, true) ?? [];
    }

    function deleteContact() {
        $users = getContactsBooks();

        $delete= array_pop($users) ;

        writeUsersToFileBook($users);
        header("Location: /");
    }

    function writeUsersToFileBook(array $users)
    {
        $json=json_encode($users);

        file_put_contents(USERS_FILE, $json);

}
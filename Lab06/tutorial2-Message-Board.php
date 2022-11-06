<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 5 - Tutorial 2 - Implement a Message Board</h3>
<?php

require "../wpassignment/include/utils.php";
$rootPath = "../wpassignment/";

class Message
{
    public $id;
    public $author;
    public $subject;
    public $msgBody;
    public $msgDate;

    public function __construct($id, $author, $subject, $msgBody, $msgDate)
    {
        $this->id = $id;
        $this->author = $author;
        $this->subject = $subject;
        $this->msgBody = $msgBody;
        $this->msgDate = $msgDate;
    }
}

class DBUtils
{
    public static function dbConnect()
    {
        // Just use the code from my assignment because im lazy
        return sqlConnect();
    }

    public static function getAllMessages()
    {
        $dbh = DBUtils::dbConnect();
        $sql = "SELECT * FROM l6_messages";
        $result = $dbh->query($sql);
        $messages = [];
        foreach ($result as $row) {
            $messages[] = new Message(
                $row["id"],
                $row["author"],
                $row["subject"],
                $row["msgDate"],
                $row["msgBody"]
            );
        }
        $dbh = null;
        return $messages;
    }

    public static function runScriptFile($scriptFile)
    {
        $dbh = DBUtils::dbConnect();
        $sql = file_get_contents($scriptFile);
        $result = $dbh->exec($sql);
        $dbh = null;
        return $result;
    }

    public static function deleteTable($tableName)
    {
        $dbh = DBUtils::dbConnect();
        $sql = "DROP TABLE IF EXISTS $tableName";
        $result = $dbh->query($sql);
        $dbh = null;
        return $result;
    }
}

DBUtils::deleteTable("l6_messages");
DBUtils::runScriptFile("messages.sql");

?>

<table>
    <tr>
        <th>Author</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Message</th>
    </tr>
    <?php foreach (DBUtils::getAllMessages() as $row) { ?>
        <tr>
            <td><?php echo $row->author; ?></td>
            <td><?php echo $row->subject; ?></td>
            <td><?php echo $row->msgDate; ?></td>
            <td><?php echo $row->msgBody; ?></td>
        </tr>
    <?php } ?>
</table>

<?php

DBUtils::deleteTable("l6_messages");

?>
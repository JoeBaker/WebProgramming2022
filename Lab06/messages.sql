CREATE TABLE IF NOT EXISTS `l6_messages` (
    id int(11) NOT NULL AUTO_INCREMENT,
    author varchar(50) NOT NULL,
    subject tinytext NOT NULL,
    msgDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    msgBody text NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO l6_messages (id, author, subject, msgDate, msgBody) VALUES
(1, 'Homer Simpson', 'A meaty message', '2019-12-07 14:54:47', 'Bacon ipsum dolor amet meatball bresaola brisket shankle chislic tail, short ribs corned beef jowl drumstick. Alcatra bacon flank chuck meatloaf ribeye. Tri-tip flank alcatra cupim, hamburger beef meatloaf pork belly doner beef ribs ribeye jowl turkey shankle shank. Shankle filet mignon swine biltong brisket shoulder, turducken alcatra chuck pastrami.'),
(2, 'Lisa Simpson', 'A veggie message', '2019-12-07 14:56:15', 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic. Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.'),
(3, 'Marge Simpson', 'And some classic lorem ipsum', '2019-12-07 14:58:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie feugiat nibh, in luctus magna tristique eu. Vivamus aliquet vehicula tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse consequat nibh ultricies orci sodales, vel consectetur urna tempus. Nulla dui erat, auctor eu finibus id, egestas quis lectus. Donec luctus sollicitudin eros sit amet placerat. Pellentesque ut consequat quam. Proin sit amet nisi et erat venenatis convallis vitae ut purus. Phasellus facilisis blandit risus ac maximus. Nulla eget ultricies urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla rhoncus semper rutrum. Cras in leo accumsan, malesuada augue a, vehicula ligula.');
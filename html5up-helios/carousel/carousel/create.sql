create table user(user varchar(25) , primary key(user));

create table question (qid varchar(20),title varchar(100),question varchar(1500),user varchar(25),tags varchar(25), upvotes int ,primary key(qid,user),foreign key(user) references user(user));

create table answer (qid varchar(20), user varchar(25) , answer varchar(1500) , upvotes int , primary key(qid,user) , foreign key(qid) references question(qid) , foreign key(user) references user(user));	

create table Q_upvotes(qid varchar(20),user varchar(25), primary key(qid,user), foreign key (user) references user(user), foreign key(qid) references question(qid) );

create table A_upvotes(qid varchar(20),user varchar(25), primary key(qid,user), foreign key (user) references user(user), foreign key(qid) references question(qid) );
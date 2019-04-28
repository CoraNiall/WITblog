-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 10:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_witblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date_time` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`) VALUES
(1, 33),
(2, 33),
(3, 33),
(4, 35),
(5, 35),
(6, 37),
(7, 37),
(8, 37),
(9, 37),
(10, 37),
(11, 39),
(12, 39),
(13, 39),
(14, 39),
(15, 39);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `content`, `user_id`, `title`, `post_date`, `location`) VALUES
(33, ' When I applied for this course I had almost no idea of what to expect. I knew I&#39;d be learning PHP, but after a couple of codeAcademy courses on HTML and CSS this didn&#39;t mean a whole lot. I also knew someone who had done it the year before and who had come from a similar educational background and she only had good things to say and convinced me it was worth applying.&#13;&#10;&#13;&#10;Rocking up to the first day of the immersion week things started to get a little clearer. What could we expect from this course? A lot of learning, yes. New friends, for sure. But what everyone came back to time and time again was the tears. We were told that we were expected to cry, that, no matter how well we thought it was going, one day we would all wake up in flood waters of our own making. Comforting.&#13;&#10;&#13;&#10;This meant that I probably spent far too long mentally preparing myself for nights spent trying to see past rivers of tears to the unintelligible lines of code on my screen. I was expecting it to be so hard that I think what we actually learnt was much more achievable in comparison. That&#39;s not to say it was easy. It has been one of the most challenging things I have undertaken in my life. Trying to balance a full time job, some semblance of a personal life and learn a whole new skill all at the same time did result in many sleepless nights and I&#39;m sure I wouldn&#39;t be the first to say that even when I was asleep, php seemed to follow me into my dreams, teasing me with unsolvable mazes of code, or worse, making me believe that I had solved our login problems only to wake with the fatal errors still live and kicking.&#13;&#10;&#13;&#10;Yes it was hard and very frustrating at times. But now it is coming to an end I realise just how much fun I have had over the past 14 weeks. The joy and satisfaction that comes with solving the errors makes the hours you&#39;ve been working on them seem like minutes (most of the time). Being able to see the effect your changes have on the results even with just a line of code is uniquely satisfying, something that I think would be hard to find with many other jobs. It really motivates you to carry on and to understand the worth behind your work. ', 1, 'A Coding Tale', '2019-04-28 16:47:01', 'Leeds, United Kingdom'),
(34, ' So by now you&#39;ve may rifled through a fair few of our blog posts all about Get into Tech and Programming generally. But maybe the only reason you&#39;re actually here is to know whether or not you should give it a go. &#13;&#10;&#13;&#10;Simple answer?&#13;&#10;YES!&#13;&#10;&#13;&#10;Even if you start learning and find that it&#39;s not for you or that you have more of a passion for something else this would still be worth the time. Much better than trying to teach yourself. this course provides structure and the resources to make sure that you understand all aspects of the languages you are learning so that when you come to building your first application, even if you don&#39;t know the exact code needed, you at least know where to look. &#13;&#10;&#13;&#10;Not sure you&#39;ll ever user it again?? If kids are learning it at school then you can guarantee that this will be a skill not only needed in future but also expected from employers so get it ticked off your list early on and start learning! &#13;&#10;&#13;&#10;This course has been fantastic simply for the huge amount of support readily available to us all at all points. The other women have been fantastic and the paired programming we&#39;ve been taught to lead with has meant that there has always been someone to speak to if you have any issues. And not to forget Martina! Patient and always ready to answer even our more ridiculous questions, she has been a rock for us all on this journey. &#13;&#10;&#13;&#10;All I would say is that from the beginning try your hands at GitHub. It&#39;s a struggle but getting to grips with it early doors will make the final project so much easier I cannot even tell you!', 1, 'Can I, Should I Do IT', '2019-04-28 16:48:09', 'Leeds, United Kingdom'),
(35, ' With the decorations packed away and memories of family time and festivities fading, the second Monday of January saw me and fifteen other women arrive on a chilly morning for the first day of our Get Into Tech course at Skyâ€™s offices at Leeds Dock. Despite being only a week before Blue Monday, in what is typically dubbed as one of the most depressing weeks of the year, the nervous excitement was palpable.  We gathered in the reception area and got reacquainted, before being taken to the meeting room that would become our classroom (and second home) during the next 15 weeks.&#13;&#10;&#13;&#10;The nerves soon settled as we got stuck in to the first day of learning.  Our tutor, Martina, eased us into the process with introductions and lots of group exercises using good old pen and paper, as we covered fundamental concepts such as what is a program, how does a programmer work, Agile, Scrum and different types of programming languages.  The first exercise got us thinking like programmers by re-evaluating the simple everyday task of making toast, and breaking it down into the kind of steps that make up a computer program.  &#13;&#10;&#13;&#10;Day two saw us get coding together for the first time, as we covered the basics of HTML and CSS, and began to use them, quickly going from â€˜Hello World!â€™ to a very basic (and in my case very ugly) â€˜About Meâ€™ page.&#13;&#10;&#13;&#10;By day three we were starting to use PHP and getting familiar with our IDE, NetBeans, an environment where weâ€™d all be spending a good proportion of our time for the next few months!  We covered data types, variables, operators, functions and conditional statements and got a glimpse of what PHP can do.&#13;&#10;&#13;&#10;On day four we started receiving user input from the console, learning about truthy and falsey values and getting our heads around arrays and loops.  We practised our logic and maths in another fun paper exercise, and by the end of the day it really felt like we were making stuff happen!&#13;&#10;&#13;&#10;The final day of our immersion week involved a deeper delve into functional programming, which we applied in our Rock, Paper, Scissors programs.  It was really satisfying to get something working that a user could easily interact with, and I managed to (mildly) impress my 10 year old son with the fact that Iâ€™d built a game that he could play!  &#13;&#10;&#13;&#10;A quick run through namespaces and including files brought the week to a close, and we took our exhausted and overloaded brains home (via the pub!) to try and let it all sink in before heading back to reality on Monday.  It was a fantastic week - intense but enjoyable and we all came away having made new friends and learnt new things!&#13;&#10;', 16, 'Making Toast', '2019-04-28 17:18:20', 'Leeds, United Kingdom'),
(36, ' On the morning of the 14th January I had no idea of the journey that was about to hit me in the face at full force. I was really excited to begin the immersion week- Iâ€™d just moved to a new city, got a new job and this was my new hobby to fit alongside them. &#13;&#10;&#13;&#10;&#13;&#10;When I walked into Sky my excitement turned to apprehension. I was sat in a room with 15 other girls, and when we did a â€˜round the tableâ€™ of peopleâ€™s past coding/dev experience I felt like I was the only person who hadnâ€™t really tried it before. This faded as soon as we cracked on with the content and by the first day weâ€™d made a website (!!), something that I never would have believed I could manage with only one day of learning! I vividly remember everyone sharing the pages theyâ€™d made as a group and how supportive the atmosphere was. Even though Iâ€™d never done anything like this before, I didnâ€™t care because everyone seemed so nice and I was already enjoying the learning.&#13;&#10;&#13;&#10;&#13;&#10;Over the week we learnt so so so much, looking back it seems crazy! The thing I am proudest of was the rock,paper,scissors game. We added to it each day during the immersion week and even improved it in later weeks homeworkâ€™s. It was so rewarding to see something Iâ€™d worked on for a while become useable, and to have something to show my friends what Iâ€™d been learning. &#13;&#10;&#13;&#10;&#13;&#10;I would love to go back and do one more immersion week with the group, I donâ€™t think I fully appreciated it at the time because I was so overwhelmed with new stuff but it really was fun!&#13;&#10;', 18, 'Induction Week', '2019-04-28 17:09:37', 'Leeds, United Kingdom'),
(37, ' When I first started the GIT course my intention was to develop as many skills as I could, mainly with the goal of finding out whether I preferred software dev more than my current job. A week after our Sky induction week I began a new job and thought that this was the perfect opportunity to compare the two paths. I would be learning a vast amount in both areas and I knew that whichever I enjoyed the most I would probably try and pursue. &#13;&#10;&#13;&#10; I naturally get bored very easily, so that beginning of the GIT course suited my learning style massively (there was absolutely no chance of getting bored!), and dealing with starting a new job at the same time was definitely a challenge. However it was a challenge that I enjoyed a lot and I think this is due to an unexpected surprise. The content and skills that I was learning during GIT massively complimented my new role, and skills Iâ€™ve picked up at work helped me with GIT - the two worked symbiotically. &#13;&#10;&#13;&#10;&#13;&#10;In my job I frequently â€˜am stuck on a problemâ€™, resorting to googling or asking peers for advice and knowing the best way to do this really helped me during the course. Alternatively, the details we learnt about the relationships between the client, server and database and how they link together has been really useful at work.&#13;&#10;I feel like I will be able to implement the languages and methods that I have learnt at get into tech into my job, and I either am currently doing so or am planning to in the future. I was not expecting the two to go together so well but it is the best thing that I have gained from the course.&#13;&#10;', 18, 'Transferable Skills', '2019-04-28 17:10:17', 'Leeds, United Kingdom'),
(38, ' Moving city, moving job and starting the GIT course probably wasnâ€™t my wisest life move. All of the above take up a serious amount of time and Iâ€™d decided to do them all in one go. Like Iâ€™ve said before, I do get bored easily so I definitely enjoyed the challenge but a challenge it was. &#13;&#10;&#13;&#10;To cope with this, Iâ€™ve had to develop my time management skills even more. So here are my top tips for when you feel like there arenâ€™t enough hours in the day:&#13;&#10;To do lists - always make them, and order them by what REALLY needs to be done and what could probably wait. I even often ordered it into days of the week so I could plan it out and make sure I could fit everything in.&#13;&#10;Optimise your work lunch time - every day I make sure I achieve one of my to do list items during lunch, time that Iâ€™d usually spend reading etc. Whether itâ€™s meeting up with a friend, running and errand or doing my GIT coursework, I realised I could fit a lot into an hour!&#13;&#10;Carry your laptop around everywhere - you never know when youâ€™re going to get a random 10 minutes of free time, so have your laptop on hand to fit in a cheeky few minutes of coding. &#13;&#10;', 18, 'Time management', '2019-04-28 17:11:25', 'Leeds, United Kingdom'),
(39, ' Today I feel like I have achieved something!&#13;&#10;&#13;&#10;I created a like function for our blog! The like button allows users to like posts , it also stores the likes into a database and has a running counter of all the likes of the post! It has only took me around 3 days to complete with multiple mental breakdowns because I can not code. &#13;&#10;&#13;&#10;A breakdown of how I did this:&#13;&#10;&#13;&#10;First of all I created the like controller and a function within this controller called postlike which talks to the database and also tells it which action to call on.&#13;&#10;&#13;&#10;I then created the function for liking a post and inserting a record of the like into the database which is the action.  This was done using a prepare statement where I inserted into the likes table in the column post id which related to the id of the post. My next step was to get the function to refresh on the same page as the blog post and show the new like. I did this by creating a show post function and placed it within the postlike function. &#13;&#10;&#13;&#10;My final step was to create a find function which would find all the likes related to that blog post, add them all together to show a total of likes for the blog post. This sounds simple but took the longest to work out. The first step was to create a find function where the likes would be selected from the database where the post id from the like matched the id from the blog post. I put this into an array and then put this array into a count so it would display the total amount of likes for that blog post. This was then echoed out into the html page and displayed the likes for the post! ', 17, 'Like Button', '2019-04-28 17:13:54', 'Leeds, United Kingdom'),
(40, ' &#13;&#10;Welcome  to my section of the blog! If you&#39;re here to find some really useful information about coding then you have come to the wrong section! This is my  general overview on the Get into Tech course in general. &#13;&#10;&#13;&#10;Coming from a background that I feel couldn&#39;t be more opposite to software development to say I have found the shift a bit of a struggle would be an understatement. Before this course I liked to think I was quite sharp and I could pick things up quickly and easily but this course has made me feel like I have about the same intelligence level as  a cheese sandwich. &#13;&#10;&#13;&#10;However, I have enjoyed every minute of it (lies - not ever single minute), I have learnt so much and found a love for coding! What am I going to do on Wednesdays now?&#13;&#10;&#13;&#10;&#13;&#10;&#13;&#10;Summary of Get into Tech / Advice for those in the future  â€”&#62;&#13;&#10;&#13;&#10;â€”&#62; Coding is HARD!&#13;&#10;&#13;&#10;â€”&#62; Whoever created the MVC skeleton is not a nice person.&#13;&#10;&#13;&#10;â€”&#62; Alternatively whoever created Trello is a genius!&#13;&#10;&#13;&#10;â€”&#62; When Martina gives you that look like â€˜how are you not getting thisâ€™&#13;&#10;&#13;&#10;â€”&#62; Learn gitHELL before your final project because itâ€™s so useful but takes at least a month to actually learn how it works and what it is good for. &#13;&#10;&#13;&#10;â€”&#62; Prepare for 4 months of constantly having code on your mind because as much as you try to distance yourself from it and focus on anything else in your life the problem you cannot solve will always be constantly swimming around your head.&#13;&#10;&#13;&#10;â€”&#62; Donâ€™t talk to me about Sessions because I don&#39;t know what that means. &#13;&#10;&#13;&#10;â€”&#62; Tell your friends/partner/family/loved ones to not talk to you or ask you to do anything for the whole four months because you wont have time to do anything anyway.&#13;&#10;&#13;&#10;', 17, 'Get Into Tech', '2019-04-28 17:15:47', 'Leeds, United Kingdom'),
(41, ' In our meetup today, we got to down planning various elements of the project: user stories, means of communication, database design, wireframing the blog site as well as deciding on who was going to do what over the coming week. We agreed that our blog would be a blog about the process of creating a blog. We plan to keep notes on the process as we go along and these notes can be reused as posts on our blog too.&#13;&#10;We decided that weâ€™ll be using Trello for organisation, Slack for sharing snippets of code and Whatsapp for general communications. Weâ€™ll be carrying out our stand-ups via Whatsapp from 8pm each day as this was the most likely time when we would all be settled down to work on our blog project. We decided that our sprints will run from Monday to Monday so that each sprint would end with a Hangout with our product owner and an opportunity after that to carry out a review before the next sprint. I volunteered to be Scrum Master as I was keen to have a go at the role.&#13;&#10;', 19, 'Planning Meeting', '2019-04-28 19:44:55', 'Enniskillen, United Kingdom'),
(42, 'We had some time to work on things during todayâ€™s Get Into Tech session. Jessie and Laura had shared their database sql file via Slack so we had all imported the database already. We re-assessed the database design, checking whether any further normalisation was needed or whether any extra columns would have to be added to accommodate different features at a later stage.&#13;&#10;We ended our session by creating the To Do list on the Trello board. We all chose our tasks: Jessie will be writing up her notes as a blog post, Laura is going to work on setting up session cookies for users, Iâ€™ll be looking into security practices for our site, Mel will be looking at error handling and exceptions and Tasha is updating layout.php with our chosen styles. We agreed that we would keep notes on the Trello tickets of what had been done in relation to those tasks so that if, for whatever reason, someone couldnâ€™t complete a task and needed to pass it on, the other team member would be able to understand what had been done and what work was still outstanding. I was conscious that with Jessie going away on holiday for a week, she might feel out-of-sync by the time she gets back and the project is still moving. I hope that this system of keeping notes on the work that we do will help her to catch up with whatâ€™s happened while she was away.  &#13;&#10;', 19, 'First sprint', '2019-04-28 19:57:33', 'Enniskillen, United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `posttag`
--

CREATE TABLE `posttag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttag`
--

INSERT INTO `posttag` (`post_id`, `tag_id`) VALUES
(30, 1),
(30, 3),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 2),
(34, 14),
(35, 2),
(35, 10),
(35, 14),
(36, 1),
(36, 2),
(36, 4),
(37, 3),
(37, 12),
(37, 14),
(38, 2),
(38, 5),
(38, 12),
(39, 1),
(39, 3),
(39, 5),
(39, 10),
(39, 14),
(40, 2),
(40, 4),
(40, 10),
(40, 14),
(41, 2),
(41, 3),
(41, 5),
(41, 14),
(42, 1),
(42, 5),
(42, 6),
(42, 9),
(42, 10);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'registered_user'),
(3, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'Technology'),
(2, 'Women'),
(3, 'Sky'),
(4, 'Education'),
(5, 'Coding'),
(6, 'PHP'),
(7, 'HTML'),
(8, 'Javascript'),
(9, 'SQL'),
(10, 'Learning'),
(11, 'Fun'),
(12, 'Career'),
(13, 'Prospects'),
(14, 'Skills'),
(15, 'Event');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `email`, `password`, `username`) VALUES
(1, 1, 'laura.rowlands02@gmail.com', 'Password1', 'Laura'),
(4, 3, 'guest@guest.com', 'guest', 'Guest'),
(16, 1, 'melpotts@email.com', 'password', 'Mel'),
(17, 1, 'tashaemail@email.com', 'password', 'Tasha'),
(18, 1, 'jessieemail@email.com', 'password', 'Jessie'),
(19, 1, 'cl.reiss@gmail.com', 'password', 'Caroline');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `post_id`) VALUES
(1, 30),
(2, 31),
(4, 33),
(5, 33),
(9, 33),
(3, 35),
(6, 35),
(7, 37),
(8, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_ibfk_2` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posttag`
--
ALTER TABLE `posttag`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `posttag`
--
ALTER TABLE `posttag`
  ADD CONSTRAINT `posttag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `posttag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

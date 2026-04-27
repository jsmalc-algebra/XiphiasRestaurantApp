<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Reservation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reservation1 = new Reservation();
        $reservation1->setFullName('Estella Beeswing');
        $reservation1->setEmail('ebeeswing0@wsj.com');
        $reservation1->setPhoneNumber('+380 852 967 2826');
        $reservation1->setDate(new \DateTime('2026-05-02'));
        $reservation1->setTimeSlot(new \DateTime('17:30'));
        $reservation1->setPartySize(6);
        $reservation1->setSpecialRequests(null);
        $reservation1->setPrivateDining(false);
        $reservation1->setReservationStatus('Confirmed');
        $reservation1->setReferenceCode('LM-6BTTW');
        $manager->persist($reservation1);

        $reservation2 = new Reservation();
        $reservation2->setFullName('Kellia Skittrell');
        $reservation2->setEmail('kskittrell1@dell.com');
        $reservation2->setPhoneNumber('+86 564 517 2505');
        $reservation2->setDate(new \DateTime('2026-05-24'));
        $reservation2->setTimeSlot(new \DateTime('16:30'));
        $reservation2->setPartySize(9);
        $reservation2->setSpecialRequests('Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.');
        $reservation2->setPrivateDining(false);
        $reservation2->setReservationStatus('Completed');
        $reservation2->setReferenceCode('LM-90V73');
        $manager->persist($reservation2);

        $reservation3 = new Reservation();
        $reservation3->setFullName('Ronnie Yair');
        $reservation3->setEmail('ryair2@princeton.edu');
        $reservation3->setPhoneNumber('+86 122 726 6648');
        $reservation3->setDate(new \DateTime('2026-05-01'));
        $reservation3->setTimeSlot(new \DateTime('20:00'));
        $reservation3->setPartySize(7);
        $reservation3->setSpecialRequests(null);
        $reservation3->setPrivateDining(false);
        $reservation3->setReservationStatus('Completed');
        $reservation3->setReferenceCode('LM-4OK22');
        $manager->persist($reservation3);

        $reservation4 = new Reservation();
        $reservation4->setFullName('Chrisy Sherrard');
        $reservation4->setEmail('csherrard3@scientificamerican.com');
        $reservation4->setPhoneNumber('+63 287 211 2012');
        $reservation4->setDate(new \DateTime('2026-05-04'));
        $reservation4->setTimeSlot(new \DateTime('19:30'));
        $reservation4->setPartySize(7);
        $reservation4->setSpecialRequests(null);
        $reservation4->setPrivateDining(false);
        $reservation4->setReservationStatus('Pending');
        $reservation4->setReferenceCode('LM-1DJLP');
        $manager->persist($reservation4);

        $reservation5 = new Reservation();
        $reservation5->setFullName('Kania Foggo');
        $reservation5->setEmail('kfoggo4@cbslocal.com');
        $reservation5->setPhoneNumber('+86 200 922 6062');
        $reservation5->setDate(new \DateTime('2026-05-06'));
        $reservation5->setTimeSlot(new \DateTime('18:00'));
        $reservation5->setPartySize(3);
        $reservation5->setSpecialRequests(null);
        $reservation5->setPrivateDining(false);
        $reservation5->setReservationStatus('Confirmed');
        $reservation5->setReferenceCode('LM-299TZ');
        $manager->persist($reservation5);

        $reservation1 = new Reservation();
        $reservation1->setFullName('Dione McDiarmid');
        $reservation1->setEmail('dmcdiarmid0@rambler.ru');
        $reservation1->setPhoneNumber('+55 806 892 6509');
        $reservation1->setDate(new \DateTime('2026-05-23'));
        $reservation1->setTimeSlot(new \DateTime('18:00'));
        $reservation1->setPartySize(11);
        $reservation1->setSpecialRequests(null);
        $reservation1->setPrivateDining(true);
        $reservation1->setReservationStatus('Pending');
        $reservation1->setReferenceCode('LM-7COF0');
        $manager->persist($reservation1);

        $reservation2 = new Reservation();
        $reservation2->setFullName('Laurel Bott');
        $reservation2->setEmail('lbott1@hostgator.com');
        $reservation2->setPhoneNumber('+385 603 408 7411');
        $reservation2->setDate(new \DateTime('2026-05-02'));
        $reservation2->setTimeSlot(new \DateTime('21:00'));
        $reservation2->setPartySize(8);
        $reservation2->setSpecialRequests('Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.');
        $reservation2->setPrivateDining(true);
        $reservation2->setReservationStatus('Cancelled');
        $reservation2->setReferenceCode('LM-XZHJF');
        $manager->persist($reservation2);

        $reservation3 = new Reservation();
        $reservation3->setFullName('Drucill Levington');
        $reservation3->setEmail('dlevington2@cloudflare.com');
        $reservation3->setPhoneNumber('+86 998 791 4552');
        $reservation3->setDate(new \DateTime('2026-05-08'));
        $reservation3->setTimeSlot(new \DateTime('21:30'));
        $reservation3->setPartySize(7);
        $reservation3->setSpecialRequests(null);
        $reservation3->setPrivateDining(true);
        $reservation3->setReservationStatus('Pending');
        $reservation3->setReferenceCode('LM-75MXT');
        $manager->persist($reservation3);

        $reservation4 = new Reservation();
        $reservation4->setFullName('Euell Rizzini');
        $reservation4->setEmail('erizzini3@twitpic.com');
        $reservation4->setPhoneNumber('+62 939 482 8175');
        $reservation4->setDate(new \DateTime('2026-05-15'));
        $reservation4->setTimeSlot(new \DateTime('21:30'));
        $reservation4->setPartySize(7);
        $reservation4->setSpecialRequests(null);
        $reservation4->setPrivateDining(true);
        $reservation4->setReservationStatus('Cancelled');
        $reservation4->setReferenceCode('LM-IKJ1S');
        $manager->persist($reservation4);

        $reservation5 = new Reservation();
        $reservation5->setFullName('Larisa Daviddi');
        $reservation5->setEmail('ldaviddi4@umich.edu');
        $reservation5->setPhoneNumber('+86 901 637 0443');
        $reservation5->setDate(new \DateTime('2026-05-01'));
        $reservation5->setTimeSlot(new \DateTime('19:30'));
        $reservation5->setPartySize(6);
        $reservation5->setSpecialRequests(null);
        $reservation5->setPrivateDining(true);
        $reservation5->setReservationStatus('Completed');
        $reservation5->setReferenceCode('LM-AVHHA');
        $manager->persist($reservation5);


        $manager->flush();
    }
}

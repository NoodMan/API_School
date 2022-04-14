<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Entity\Lesson;
use App\Entity\Students;
use App\Entity\Classroom;


class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $director = (new User())->setUsername("Picsou")->setLastname("McPicsou")->setFirstname("Balthazar ")->setRoles(["ROLE_ADMIN"]);
        $hashedPassword = $this->encoder->hashPassword($director, "picsou");
        $director->setPassword($hashedPassword);
        $manager->persist($director);

        $teacher_b = (new User())->setUsername("teacher_baba")->setLastname("Mamie")->setFirstname("Baba")->setSeniority("14 year")->setSalary(100000)->setRoles(["ROLE_TEACHER"]);
        $hashedPassword = $this->encoder->hashPassword($teacher_b, "baba");
        $teacher_b->setPassword($hashedPassword);
        $manager->persist($teacher_b);

        $teacher_f = (new User())->setUsername("teacher_flagada")->setLastname("Flagada")->setFirstname("Jones")->setSeniority("9 year")->setSalary(50000)->setRoles(["ROLE_TEACHER"]);
        $hashedPassword = $this->encoder->hashPassword($teacher_f, "flagada");
        $teacher_f->setPassword($hashedPassword);
        $manager->persist($teacher_f);

        $student_r = (new Students())->setParentEmail("contact.riri@orange.fr")->setGender("Boy")->setUsername("Riri")->setRoles(["ROLE_STUDENT"])->setFirstname("Jr")->setLastname("Riri");
        $hashPassword = $this->encoder->hashPassword($student_r, "riri");
        $student_r->setPassword($hashPassword);
        $manager->persist($student_r);

        $student_f = (new Students())->setParentEmail("contact.fifi@orange.fr")->setGender("Boy")->setUsername("Fifi")->setRoles(["ROLE_STUDENT"])->setFirstname("Jr")->setLastname("Fifi");
        $hashPassword = $this->encoder->hashPassword($student_f, "fifi");
        $student_f->setPassword($hashPassword);
        $manager->persist($student_f);

        $student_l = (new Students())->setParentEmail("contact.loulou@orange.fr")->setGender("Boy")->setUsername("Loulou")->setRoles(["ROLE_STUDENT"])->setFirstname("Jr")->setLastname("Loulou");
        $hashPassword = $this->encoder->hashPassword($student_l, "loulou");
        $student_l->setPassword($hashPassword);
        $manager->persist($student_l);

        $student_z = (new Students())->setParentEmail("contact.zaza@orange.fr")->setGender("Girl")->setUsername("Zaza")->setRoles(["ROLE_STUDENT"])->setFirstname("Vanderquack")->setLastname("Zaza");
        $hashPassword = $this->encoder->hashPassword($student_z, "zaza");
        $student_z->setPassword($hashPassword);
        $manager->persist($student_z);

        $room1 = (new Classroom())->setLabel("Year 2");
        $manager->persist($room1);

        $room2 = (new Classroom())->setLabel("Year 3");
        $manager->persist($room2);

        $room3 = (new Classroom())->setLabel("Year 4");
        $manager->persist($room3);

        $room4 = (new Classroom())->setLabel("Year 5");
        $manager->persist($room4);

        $room5 = (new Classroom())->setLabel("Year 6");
        $manager->persist($room5);



        $lesson1 = (new Lesson())->setLabel("English");
        $manager->persist($lesson1);

        $lesson2 = (new Lesson())->setLabel("Math");
        $manager->persist($lesson2);

        $lesson3 = (new Lesson())->setLabel("History & Geography");
        $manager->persist($lesson3);

        $lesson4 = (new Lesson())->setLabel("Science and Earth Life");
        $manager->persist($lesson4);

        $lesson5 = (new Lesson())->setLabel("Design");
        $manager->persist($lesson5);
    

        $manager->flush();
    }
}

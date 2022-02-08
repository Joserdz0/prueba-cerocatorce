<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */

    public function findUsersActivos()
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.status = :val')
            ->setParameter('val', 1)
            ->orderBy('u.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
    //Nota:NO se elimina por completo el usuario solo se deja de mostrar
    public function elimUsuario(User $user): User
    {
        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
    public function crearUsuario($name, $lastname, $age)
    {
        $newUser = new User();

        $newUser
            ->setName($name)
            ->setLastname($lastname)
            ->setAge($age)
            ->setStatus(1);

        $this->manager->persist($newUser);
        $this->manager->flush();
    }
    public function modifUsuario(User $user): User
    {
        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}

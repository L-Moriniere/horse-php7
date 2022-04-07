<?php

namespace App\Controller\Admin;

use App\Entity\AccountHistory;
use App\Entity\Article;
use App\Entity\BankAccount;
use App\Entity\CleanState;
use App\Entity\Contest;
use App\Entity\Disease;
use App\Entity\EquestrianCenter;
use App\Entity\Event;
use App\Entity\ExhaustState;
use App\Entity\Horse;
use App\Entity\HungerState;
use App\Entity\Infrastructure;
use App\Entity\Injury;
use App\Entity\Item;
use App\Entity\ItemFamily;
use App\Entity\MoralState;
use App\Entity\Newspaper;
use App\Entity\Parasit;
use App\Entity\RidingClub;
use App\Entity\StressState;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        if ('admin-user-db' === $this->getUser()->getUsername()) {
            return $this->redirect("http://localhost/phpmyadmin/index.php?route=/server/privileges&viewing_mode=server");
        }


         if ('admin-user' === $this->getUser()->getUsername()) {
             $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();
         }
         elseif ('admin-contest' === $this->getUser()->getUsername()){
             $url = $this->adminUrlGenerator->setController(ContestCrudController::class)->generateUrl();
         }
         elseif ('admin-newspaper' === $this->getUser()->getUsername() || 'client' === $this->getUser()->getUsername()){
             $url = $this->adminUrlGenerator->setController(NewspaperCrudController::class)->generateUrl();
         }
         else{
            $url = $this->adminUrlGenerator->setController(HorseCrudController::class)->generateUrl();
        }
        return $this->redirect($url);
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Cheval');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_ADMIN_DATA') )
        {
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('Horse', 'fa fa-horse', Horse::class);
            yield MenuItem::linkToCrud('Account History', 'fa fa-clock', AccountHistory::class);
            yield MenuItem::linkToCrud('Article', 'fa fa-pen', Article::class);
            yield MenuItem::linkToCrud('Bank Account', 'fa fa-piggy-bank', BankAccount::class);
            yield MenuItem::linkToCrud('Contest', 'fa fa-medal', Contest::class);
            yield MenuItem::linkToCrud('Equestrian Center', 'fas fa-horse-head', EquestrianCenter::class);
            yield MenuItem::linkToCrud('Event', 'fa fa-calendar', Event::class);
            yield MenuItem::linkToCrud('Infrastructure', 'fa fa-building', Infrastructure::class);
            yield MenuItem::linkToCrud('Item', 'fas fa-cog', Item::class);
            yield MenuItem::linkToCrud('ItemFamily', 'fas fa-cogs', ItemFamily::class);
            yield MenuItem::linkToCrud('Newspaper', 'fa fa-newspaper', Newspaper::class);
            yield MenuItem::linkToCrud('Riding Club', 'fas fa-hat-cowboy', RidingClub::class);
            yield MenuItem::linkToCrud('Task', 'fas fa-clipboard-check', Task::class);
            yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
            // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

            yield MenuItem::section('Etats');
            yield MenuItem::linkToCrud('Clean State', 'fa fa-soap', CleanState::class);
            yield MenuItem::linkToCrud('Disease', 'fas fa-disease', Disease::class);
            yield MenuItem::linkToCrud('Exhaust State', 'fas fa-bed', ExhaustState::class);
            yield MenuItem::linkToCrud('Hunger State', 'fas fa-apple-alt', HungerState::class);
            yield MenuItem::linkToCrud('Injury', 'fas fa-band-aid', Injury::class);
            yield MenuItem::linkToCrud('Moral State', 'fa fa-brain', MoralState::class);
            yield MenuItem::linkToCrud('Parasite', 'fa fa-bug', Parasit::class);
            yield MenuItem::linkToCrud('Stress State', 'fas fa-cloud-showers-heavy', StressState::class);

        }

        elseif ($this->isGranted('ROLE_ADMIN_USER')){
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
        }

        elseif ($this->isGranted('ROLE_ADMIN_HORSE')){
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('Horse', 'fa fa-horse', Horse::class);

            yield MenuItem::section('Etats');
            yield MenuItem::linkToCrud('Clean State', 'fa fa-soap', CleanState::class);
            yield MenuItem::linkToCrud('Exhaust State', 'fas fa-bed', ExhaustState::class);
            yield MenuItem::linkToCrud('Hunger State', 'fas fa-apple-alt', HungerState::class);
            yield MenuItem::linkToCrud('Moral State', 'fa fa-brain', MoralState::class);
            yield MenuItem::linkToCrud('Stress State', 'fas fa-cloud-showers-heavy', StressState::class);

        }

        elseif ($this->isGranted('ROLE_ADMIN_CONTEST')){
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('Contest', 'fa fa-medal', Contest::class);
        }

        elseif ($this->isGranted('ROLE_ADMIN_NEWSPAPER')){
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('Newspaper', 'fa fa-newspaper', Newspaper::class);
        }

        elseif ($this->isGranted('ROLE_CLIENT')){
            yield MenuItem::section('Tables principales');
            yield MenuItem::linkToCrud('Contest', 'fa fa-medal', Contest::class);
            yield MenuItem::linkToCrud('Newspaper', 'fa fa-newspaper', Newspaper::class);
        }





    }
}

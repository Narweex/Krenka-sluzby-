<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;

use Ublaboo\DataGrid\DataGrid;
use Ublaboo\DataGrid\DataSource;

class HomePresenter extends Nette\Application\UI\Presenter
{



    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database)
    {

        $this->database = $database;

    }

    public function createComponentGrid($name)
    {

        $grid = new DataGrid($this, $name);

        $grid->setItemsPerPageList([10, 50, 100]);

        $grid->setColumnsHideable(FALSE);

        $grid->setDataSource($this->database->query('SELECT p.id_problemu AS `id`, p.chyba, p.status, p.vytvoreno, p.popis_reseni, pr.trida, pr.id AS `projektor_id`, u.jmeno FROM `problemy` p LEFT JOIN projektory pr ON p.id_projektor = pr.id LEFT JOIN uzivatele u ON p.id_uzivatel = u.id ORDER BY p.id_problemu DESC;')->fetchAll());



        $grid->addColumnNumber('id', 'id')->SetSortable();
        $grid->addColumnText('trida', 'Třída');
        $grid->addColumnText('jmeno', 'Uzivatel');

        $grid->addColumnText('chyba', 'Popis problému');
        $grid->addColumnText('popis_reseni', 'Řešení')

            ->setEditableCallback(function ($id_problemu, $value): void {

                $this->database->query('UPDATE problemy SET', ['popis_reseni' => $value,], 'WHERE id_problemu = ?', $id_problemu);
                die;
            });





        $grid->addColumnStatus('status', 'Status')

            ->setCaret(FALSE)

            ->addOption("t", "Funkční")

            ->setIcon("check")

            ->setClass("btn-success")

            ->endOption()

            ->addOption("f", "Nefunkční")

            ->setIcon("close")

            ->setClass("btn-danger")

            ->endOption()

            ->addOption("z", "Probíhá oprava")

            ->setIcon("close")

            ->setClass("btn-warning")

            ->endOption()

            ->onChange[] = function ($id, $status) {

                if ($this->isAjax()) {

                    $this->database->query('UPDATE problemy SET', ['status' => $status,], 'WHERE id_problemu = ?', $id);
                    $this->database->query("INSERT INTO `oznameni` (`id`, `id_problemu`, `typ`, `zmena`, `cas`) VALUES ('', '$id', 'projektor', '$status', current_timestamp());");
                    $this->redrawControl('content');
                    $this['grid']->reload();
                    $this->redirect('default');

                }
                return;
            };


        $grid->addColumnDateTime('vytvoreno', 'Vytvoreno')

            ->setFormat('d.m h:i');


        $grid->addExportCsv('Export do CSV', 'examples.csv')

            ->setTitle('Export do CSV');

        $grid->setDefaultSort(['id_problemu' => 'DESC']);
    }

    public function statusChange($id, $status)
    {


        if ($this->isAjax()) {

            $this->database->query('UPDATE problemy SET', ['status' => $status,], 'WHERE id_problemu = ?', $id);

            $this['grid']->redrawItem($id);


        }

        return;
    }



}
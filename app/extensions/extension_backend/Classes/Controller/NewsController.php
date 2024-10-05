<?php
namespace SchommerMedia\SmediaNews\Controller;

use Psr\Http\Message\ResponseInterface;
use SchommerMedia\SmediaNews\Domain\Repository\NewsRepository;
use SchommerMedia\SmediaNews\Domain\Model\News;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class NewsController extends ActionController
{

    public function __construct( protected NewsRepository $newsRepository)
    {}

    public function listAction() : ResponseInterface
    {
        $storagePid = (string)$this->settings['storagePid'];
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings $querySettings */
            $querySettings = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);

            $querySettings->setRespectStoragePage(true);
            var_dump(GeneralUtility::trimExplode(',', $storagePid, true));
            $querySettings->setStoragePageIds(GeneralUtility::trimExplode(',', $storagePid, true));

            $this->newsRepository->setDefaultQuerySettings($querySettings);

        $newsItems = $this->newsRepository->findAll();
        $this->view->assign('news', $newsItems);

        return $this->htmlResponse();
    }


    public function detailAction()
    {
        $newsItems = $this->newsRepository->findAll();
    
        $this->view->assign('news', $newsItems);
        //$this->view->assign('new', $new);

        return $this->htmlResponse();
    }
}

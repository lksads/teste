<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertStringContainsString;

class PaginaInicialTest extends TestCase{

    public function testPaginaNaoLogadaDeveSerListagemDeSerie(){
        //Arrange
        $host = 'http://localhost:4444/wd/hub';
        $driver = RemoteWebDriver::create($host,DesiredCapabilities::firefox());

        //Act
        $driver->get('http://127.0.0.1:8080');

        //Assert
        $h1Locator = WebDriverBy::tagName('h2');
        $textoH1 = $driver
            ->findElement($h1Locator)
            ->getText();

        /*$testoBotaoAdicionar = $driver
            ->findElement(WebDriverBy::cssSelector('.btn.btn-dark.mb-2'))
            ->getText();*/
        
        self::assertSame('Séries', $textoH1);
        //self::assertSame('Adicionar', $testoBotaoAdicionar);

    }
}
<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

    class RegistroTest extends TestCase{
         public function testQandoRegistrarNovoUsuarioDeveRedirecionarParaListaDeSeries(){
            //Arrange
            $host = 'http://localhost:4444/wd/hub';
            $driver = RemoteWebDriver::create($host,DesiredCapabilities::firefox());
            $driver->get('http://0.0.0.0:8080/novo-usuario');

            //Act
            $inputName = $driver->findElement(WebDriverBy::id('name'));
            $inputEmail = $driver->findElement(WebDriverBy::id('email'));
            $inputSenha = $driver->findElement(WebDriverBy::id('password'));

            $inputName->sendKeys('Nome Teste');
            $inputEmail->sendKeys('email@test.com');
            $inputSenha->sendKeys('123');

            $inputSenha->submit();

            //Assert

            self::assertSame('http://0.0.0.0:8080/series', $driver->getCurrentURL());
            self::assertInstanceOf(RemoteWebElement::class, $driver->findElement(WebDriverBy::linkText('Sair'))->isDisplayed());


         }
    }
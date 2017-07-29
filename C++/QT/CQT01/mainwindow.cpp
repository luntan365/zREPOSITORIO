#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
}

MainWindow::~MainWindow()
{
    delete ui;
}



void MainWindow::on_botao_ok_clicked()
{
    QString texto = ui->texto_entrada->text();
    if(texto.isEmpty()) return;
    ui->texto_saida->setText(texto);
}

void MainWindow::on_botao_cancel_clicked()
{
    ui->texto_entrada->setText("");
    ui->texto_saida->setText("");
}

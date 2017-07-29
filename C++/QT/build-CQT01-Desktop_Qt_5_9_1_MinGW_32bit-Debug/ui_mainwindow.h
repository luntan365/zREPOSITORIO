/********************************************************************************
** Form generated from reading UI file 'mainwindow.ui'
**
** Created by: Qt User Interface Compiler version 5.9.1
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_MAINWINDOW_H
#define UI_MAINWINDOW_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenu>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_MainWindow
{
public:
    QAction *actionAbri;
    QAction *actionSalvar;
    QWidget *centralWidget;
    QVBoxLayout *verticalLayout;
    QLineEdit *texto_entrada;
    QPushButton *botao_ok;
    QLineEdit *texto_saida;
    QPushButton *botao_cancel;
    QMenuBar *menuBar;
    QMenu *menuPrimeira_Aplicacao_em_QT;
    QMenu *menuEdite;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *MainWindow)
    {
        if (MainWindow->objectName().isEmpty())
            MainWindow->setObjectName(QStringLiteral("MainWindow"));
        MainWindow->resize(400, 300);
        actionAbri = new QAction(MainWindow);
        actionAbri->setObjectName(QStringLiteral("actionAbri"));
        actionSalvar = new QAction(MainWindow);
        actionSalvar->setObjectName(QStringLiteral("actionSalvar"));
        centralWidget = new QWidget(MainWindow);
        centralWidget->setObjectName(QStringLiteral("centralWidget"));
        verticalLayout = new QVBoxLayout(centralWidget);
        verticalLayout->setSpacing(6);
        verticalLayout->setContentsMargins(11, 11, 11, 11);
        verticalLayout->setObjectName(QStringLiteral("verticalLayout"));
        texto_entrada = new QLineEdit(centralWidget);
        texto_entrada->setObjectName(QStringLiteral("texto_entrada"));

        verticalLayout->addWidget(texto_entrada);

        botao_ok = new QPushButton(centralWidget);
        botao_ok->setObjectName(QStringLiteral("botao_ok"));

        verticalLayout->addWidget(botao_ok);

        texto_saida = new QLineEdit(centralWidget);
        texto_saida->setObjectName(QStringLiteral("texto_saida"));

        verticalLayout->addWidget(texto_saida);

        botao_cancel = new QPushButton(centralWidget);
        botao_cancel->setObjectName(QStringLiteral("botao_cancel"));

        verticalLayout->addWidget(botao_cancel);

        MainWindow->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(MainWindow);
        menuBar->setObjectName(QStringLiteral("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 400, 21));
        menuPrimeira_Aplicacao_em_QT = new QMenu(menuBar);
        menuPrimeira_Aplicacao_em_QT->setObjectName(QStringLiteral("menuPrimeira_Aplicacao_em_QT"));
        menuEdite = new QMenu(menuBar);
        menuEdite->setObjectName(QStringLiteral("menuEdite"));
        MainWindow->setMenuBar(menuBar);
        mainToolBar = new QToolBar(MainWindow);
        mainToolBar->setObjectName(QStringLiteral("mainToolBar"));
        MainWindow->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(MainWindow);
        statusBar->setObjectName(QStringLiteral("statusBar"));
        MainWindow->setStatusBar(statusBar);

        menuBar->addAction(menuPrimeira_Aplicacao_em_QT->menuAction());
        menuBar->addAction(menuEdite->menuAction());
        menuPrimeira_Aplicacao_em_QT->addAction(actionAbri);
        menuPrimeira_Aplicacao_em_QT->addAction(actionSalvar);

        retranslateUi(MainWindow);

        QMetaObject::connectSlotsByName(MainWindow);
    } // setupUi

    void retranslateUi(QMainWindow *MainWindow)
    {
        MainWindow->setWindowTitle(QApplication::translate("MainWindow", "MainWindow", Q_NULLPTR));
        actionAbri->setText(QApplication::translate("MainWindow", "Abri", Q_NULLPTR));
        actionSalvar->setText(QApplication::translate("MainWindow", "Salvar", Q_NULLPTR));
        botao_ok->setText(QApplication::translate("MainWindow", "Ok!", Q_NULLPTR));
        botao_cancel->setText(QApplication::translate("MainWindow", "Cancel", Q_NULLPTR));
        menuPrimeira_Aplicacao_em_QT->setTitle(QApplication::translate("MainWindow", "Arquivo", Q_NULLPTR));
        menuEdite->setTitle(QApplication::translate("MainWindow", "Edite", Q_NULLPTR));
    } // retranslateUi

};

namespace Ui {
    class MainWindow: public Ui_MainWindow {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_MAINWINDOW_H

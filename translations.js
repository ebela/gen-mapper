const translations = {
  en: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Untitled project',
        'project': 'Project',
        'help': 'Help',
        'helpAbout': 'Help / About',
        'zooming': 'Zooming',
        'originalZoom': 'Original Zoom &amp; Position',
        'zoomIn': 'Zoom In',
        'zoomOut': 'Zoom Out',
        'importExport': 'Import / Export',
        'importXlsxCsv': 'Import XLSX / CSV',
        'exportCsv': 'Export CSV',
        'printing': 'Printing',
        'btnPrintVertical': 'Print Vertical Multipage',
        'btnPrintHorizontal': 'Print Horizontal One-page'
      },
      'editGroup': {
        'editGroup': 'Edit group',
        'btnSubmit': 'Submit changes',
        'btnCancel': 'Cancel',
        'btnDelete': 'Delete subtree',
        'btnImportSubtree': 'Import subtree',
        'btnExportSubtree': 'Export subtree',
        'elementParent': 'Parent',
        'notAvaliable': 'N/A',
        'hoverDeleteGroupAndSubtree': 'Delete group &amp; subtree',
        'hoverAddChildGroup': 'Add child group'
      },
      'messages': {
        'editProjectName': 'Edit Project name',
        'errProjectNameEmpty': "Project name can't be empty!",
        'btnOK': 'OK',
        'errDeleteRoot': 'Sorry. Deleting root group is not possible.',
        'confirmDeleteGroup': 'Do you really want to delete {{groupName}}?',
        'confirmDeleteGroupWithChildren': 'Do you really want to delete {{groupName}} and all descendants?',
        'saveAsInSafari': 'Save as:<br>(Note: Safari browser has issues with export, please see GenMapper -> Help for more info)',
        'saveAs': 'Save as:',
        'confirmImportSubtreeOverwrite': 'Warning: Importing subtreee will overwrite this group ({{groupName}}) and all descendants. Do you want to continue?',
        'errImport': 'Error when importing file.',
        'errImportWhatToCheck': 'Please check that the file is in correct format (comma separated values), that the root group has no parent, and that all other relationships make a valid tree.<br>Also check that you use the correct version of the App.',
        'selectFile': 'Please select a file',
        'errWrongFileType': 'Wrong type of file. Please import xls, xlsx or csv files.'
      },
      'help': {
        'genmapperHelp': 'GenMapper Help',
        'introContent': "Hello, this app should serve for mapping generations of simple churches. I pray it serves you to advance Jesus' kingdom.",
        'legendHeader': 'Legend',
        'legendGroup': 'Each circle represents a group / church. Dashed circle means group, full circle means church.<br>On the top the numbers describe: # total, # believers, # baptized<br>Inside the circle are the elements that are practiced in the group.<br>On the left there numbers 1 to 7 represent which elements of 3/3 process are practised:<br>1 - Personal care 2 - Worship 3 - Accountability 4 - Vision casting 5 - Bible study 6 - Practice 7 - Set goals and prayer',
        'legendClicking': 'Click on the group to edit it.<br>Click on red (X) button to remove group.<br>Click on green (+) button to add child group.',
        'importExportHeader': 'Import / Export',
        'importExportWarningChangesLost': 'Note: If you don\'t export, all changes will be lost when refreshing or closing page.',
        'importExportContent': 'You can import a .xlsx or .xls (MS Excel) or .csv (Comma separated values) files.<br>You can also import a subtree by clicking a given group and then using the \'Import Subtree\' button.<br>Export is currently available only to .csv format.',
        'exportSafariIssuePart1': 'Note: Some versions of Safari have problems with export to csv. If a new tab with blob is opened instead of file downloaded (see example below)',
        'exportSafariIssuePart2': 'press Cmd + S, then enter a filename ending .csv, select Format: Page Source, and finally click Save',
        'exportToPdf': 'For Export to PDF, use the Print buttons and then save as PDF in Chrome or Safari.',
        'panZoomHeader': 'Panning / Zooming',
        'panZoomContent': 'You can pan by draging the map and zoom by mouse wheel or using buttons on the left.',
        'changelogHeader': 'Changelog &amp; version info',
        'genmapperVersion': 'GenMapper version',
        'templateVersion': 'Template version',
        'changelogLink': 'Changelog link',
        'creditsHeader': 'Credits',
        'creditsThanks1': 'Thanks to Curtis Sergeant for the idea of generational mapping and for providing useful feedback.',
        'creditsJavaScriptLibraries': 'JavaScript/CSS libraries used',
        'creditsIcons': 'Icons used',
        'creditsAnd': 'and',
        'creditsCopyright': 'Copyright (c) 2016 - 2017 Daniel Vopalecky',
        'creditsLicense': 'Licensed with MIT Licence',
        'creditsGithub': 'Github repository',
        'creditsSuggestions': 'Please send suggestions and bugs to daniel.vopalecky@seznam.cz',
        'btnOKStart': 'OK, let\'s start!'
      }
    }
  },
  cs: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Mapa bez jména',
        'help': 'Nápověda',
        'helpAbout': 'Nápověda / O aplikaci',
        'zooming': 'Lupa',
        'originalZoom': 'Originální velikost a pozice',
        'zoomIn': 'Přiblížit',
        'zoomOut': 'Oddálit',
        'importExport': 'Import / Export',
        'importXlsxCsv': 'Import XLSX / CSV',
        'exportCsv': 'Export CSV',
        'printing': 'Tisk',
        'btnPrintVertical': 'Tisk vertikálně více stran',
        'btnPrintHorizontal': 'Tisk horizontálně 1 strana'
      },
      'editGroup': {
        'editGroup': 'Editace skupiny',
        'btnSubmit': 'Hotovo',
        'btnCancel': 'Zpět',
        'btnDelete': 'Smazat podstrom',
        'btnImportSubtree': 'Importovat podstrom',
        'elementParent': 'Mateřská skupina',
        'notAvaliable': 'Není dostupný',
        'hoverDeleteGroupAndSubtree': 'Smazat skupinu a celý podstrom',
        'hoverAddChildGroup': 'Přidat dceřinnou skupinu'
      },
      'messages': {
        'editProjectName': 'Editace jména projektu',
        'errProjectNameEmpty': 'Jméno projektu nemůže být prázdné!',
        'btnOK': 'OK',
        'errDeleteRoot': 'Kořenovou skupinu není možné smazat',
        'confirmDeleteGroup': 'Opravdu chceš smazat {{groupName}}?',
        'confirmDeleteGroupWithChildren': 'Opravdu chceš smazat {{groupName}} a všechny potomky?',
        'saveAsInSafari': 'Uložit jako:(Poznámka: Prohlížeč Safari má problémy s exportem, viz GenMapper > Nápověda pro více info)',
        'saveAs': 'Uložit jako:',
        'confirmImportSubtreeOverwrite': 'Varování: Importování podstromu přepíše tuto skupinu ({{groupName}} a všechny potomky. Chceš pokračovat?',
        'errImport': 'Chyba při importu.',
        'errImportWhatToCheck': 'Prosím zkontroluj, jestli je soubor ve správném formátu (hodnoty oddělené čárkou), že mateřská skupina nemá žádného rodiče a že všechny další vztahy vytvářejí platný strom. Také zkontroluj, že máš správnou verzi aplikace.',
        'selectFile': 'Vyber soubor.',
        'errWrongFileType': 'Špatný typ soubor. Prosím importuj soubory xls, xlsx nebo csv.'
      },
      'help': {
        'genmapperHelp': 'GenMapper Nápověda',
        'introContent': 'Ahoj, tato aplikace má sloužit mapování generací jednoduchých církví. Modlím se, ať slouží k rozvoji Božího království.',
        'importExportHeader': 'Import / Export',
        'importExportWarningChangesLost': 'Poznámka: Pokud neklikneš na export, tak se všechny změny ztratí při obnovení nebo zavření stránky.',
        'importExportContent': 'Můžeš importovat soubory typu .xlsx nebo .xls (MS Excel) nebo .csv (hodnoty oddělené čárkou).<br>Můžeš taky importovat podstrom kliknutím na danou skupinu a potom na tlačítko \'Importovat podstrom\'<br>Export je v tuto chvíli možný pouze do .csv formátu.',
        'exportSafariIssuePart1': 'Poznámka: Některé verze prohlížeče Safari mají problém s exportem to csv. Pokud se ti otevře nová záložka s blobem místo toho, aby se stáhl soubor (viz příklad níže)',
        'exportSafariIssuePart2': 'stiskni Cmd + S, potom zadej jméno souboru končíci na .csv, vyber Format: Page Source, a klikni Uložit.',
        'exportToPdf': 'Pro export do PDF, použij tlačítka k tisku a poté ulož jako PDF v Chromu nebo Safari.',
        'panZoomHeader': 'Posouvání / Přibližování',
        'panZoomContent': 'Mapa se posouvá tažením mapy a přiblížení je možné tlačítkem myši nebo použitím tlačítek v levém menu.',
        'changelogHeader': 'Historie změn a verze',
        'changelogLink': 'Historie změn',
        'genmapperVersion': 'Verze Genmapperu',
        'templateVersion': 'Verze šablony',
        'creditsHeader': 'Poděkování',
        'creditsThanks1': 'Díky Curtisu Sergeantovi za myšlenku generačních map a za zpětnou vazbu.',
        'creditsJavaScriptLibraries': 'Použité JavaScript/CSS knihovny',
        'creditsIcons': 'Použité ikony',
        'creditsAnd': 'a',
        'creditsCopyright': 'Copyright (c) 2016 - 2017 Daniel Vopalecký',
        'creditsLicense': 'MIT Licence',
        'creditsGithub': 'Github repo',
        'creditsSuggestions': 'Podněty a chyby posílej na daniel.vopalecky@seznam.cz',
        'btnOKStart': 'OK, jdeme na to!'
      }
    }
  },
  es: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Proyecto',
        'project': 'Proyecto',
        'language': 'Lengua',
        'help': 'Ayuda',
        'helpAbout': 'Ayuda / Acerca de',
        'zooming': 'Aumentar',
        'originalZoom': 'Posición y tamaño original',
        'zoomIn': 'Aumentar',
        'zoomOut': 'Quitar aumento',
        'importExport': 'Importar/Exportar',
        'importXlsxCsv': 'Importar XLXS / CSV',
        'exportCsv': 'Exportar CSV',
        'printing': 'Imprimir',
        'btnPrintVertical': 'Vertical Varias páginas',
        'btnPrintHorizontal': 'Horizontal Una página'
      },
      'editGroup': {
        'editGroup': 'Editar grupo',
        'btnSubmit': 'Presentar Cambios',
        'btnCancel': 'Cancelar',
        'btnDelete': 'Eliminar subárbol',
        'btnImportSubtree': 'Subárbol De importaci',
        'elementParent': 'Discipulador',
        'notAvaliable': 'Editar grupo',
        'hoverDeleteGroupAndSubtree': 'Eliminar grupo y sub-árbol',
        'hoverAddChildGroup': 'Añadir grupo secundario'
      },
      'messages': {
        'editProjectName': 'Editar nombre del proyecto',
        'errProjectNameEmpty': 'Nombre del proyecto no puede estar vacía!',
        'btnOK': 'Aceptar',
        'errDeleteRoot': 'Lo siento. Eliminando grupo de raíz no es posible.',
        'confirmDeleteGroup': '¿De verdad quiere eliminar {{groupName}}?',
        'confirmDeleteGroupWithChildren': '¿De verdad quiere eliminar {{groupName}} y todos los descendientes?',
        'saveAsInSafari': 'Guardar como<br>(Nota: el navegador Safari tiene problemas con la exportación, consulte genMapper -> Ayuda para obtener más información)',
        'saveAs': 'Guardar como:',
        'confirmImportSubtreeOverwrite': 'Advertencia: La importación de subárbol se sobreponen a este grupo ({{groupName}}) y todos los descendientes. ¿Quieres continuar?',
        'errImport': 'Error al importar el archivo.',
        'errImportWhatToCheck': 'Por favor, compruebe que el archivo está en formato correcto (valores separados por comas), que el grupo raíz no tiene padre, y que todas las demás relaciones hacen un árbol válida.<br>También comprueba que utilice la versión correcta de la aplicación.',
        'selectFile': 'Por favor, seleccione un archivo',
        'errWrongFileType': 'Tipo Incorrecto de archivo. Por favor importar xls, xlsx o csv.'
      },
      'help': {
        'genmapperHelp': 'Genmapper Ayuda',
        'introContent': 'Hola, esta aplicación debe servir para las generaciones de mapeo de las iglesias simples. Oro para que le sirve para avanzar el reino de Jesús.',
        'importExportHeader': 'Importación y exportación',
        'importExportWarningChangesLost': 'Nota: Si no exporta, todos los cambios se perderán al actualizar la página o cierre.',
        'importExportContent': 'Puede importar un .xls .xlsx o (MS Excel) o .csv (valores separados por comas) archivos. <br>También puede importar un subárbol haciendo clic en un grupo dado y luego usando el botón \'Importar subárbol\'. <br>Exportación está disponible actualmente sólo para formato .csv.',
        'exportSafariIssuePart1': 'Nota: Algunas versiones de Safari tienen problemas con la exportación a CSV. Si una nueva pestaña con burbuja se abre en lugar del archivo descargado (véase el ejemplo a continuación)',
        'exportSafariIssuePart2': 'pulse Comando + S, a continuación, introduzca un nombre de archivo que termina .csv, seleccione Formato: Origen de la página y, por último, haga clic en Guardar.',
        'exportToPdf': 'Para la exportación a PDF, utilice los botones de impresión y luego guardar como PDF en Chrome o Safari.',
        'panZoomHeader': 'Traslado / Zoom',
        'panZoomContent': 'Puede desplazarse por el mapa arrastrando y zoom mediante la rueda del ratón o usando los botones de la izquierda.',
        'changelogHeader': 'Cambios y información de la versión',
        'changelogLink': 'Vínculo para registro de cambios',
        'genmapperVersion': 'Versión genMapper',
        'templateVersion': 'Versión de la plantilla',
        'creditsHeader': 'Créditos',
        'creditsThanks1': 'Gracias a Curtis Sergeant de la idea de genmapper y para proporcionar información útil.',
        'creditsJavaScriptLibraries': 'Bibliotecas Javascript/CSS empleado',
        'creditsIcons': 'Iconos empleado',
        'creditsAnd': 'y',
        'creditsCopyright': 'Copyright (c) 2016-2017 Daniel Vopalecky',
        'creditsLicense': 'Licencia con el MIT License',
        'creditsGithub': 'Repositorio de Github',
        'creditsSuggestions': 'Por favor, enviar sugerencias y errores a daniel.vopalecky@seznam.cz',
        'btnOKStart': '¡De acuerdo, empecemos!'
      }
    }
  },
  pl: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'projekt bez tytułu',
        'languageName': 'Polski',
        'language': 'Język',
        'help': 'Pomoc',
        'helpAbout': 'Pomoc/ Info',
        'zooming': 'Powiększenie',
        'originalZoom': 'Oryginalny rozmiar i pozycja',
        'zoomIn': 'Powiększenie',
        'zoomOut': 'Pomniejszenie',
        'importExport': 'Importuj / Eksportuj',
        'importXlsxCsv': 'Importuj XLXS / CSV',
        'exportCsv': 'Eksportuj CSV',
        'printing': 'Drukuj',
        'btnPrintVertical': 'Drukuj stronę pionowo',
        'btnPrintHorizontal': 'Drukuj stronę poziomo na jednej kartce'
      },
      'editGroup': {
        'editGroup': 'Edytuj grupę',
        'btnSubmit': 'Zapisz zmiany',
        'btnCancel': 'Anuluj',
        'btnDelete': 'Usuń poddiagram',
        'btnImportSubtree': 'Dodaj poddiagram',
        'elementParent': 'Rodzic',
        'notAvaliable': 'nieosiągalne',
        'hoverDeleteGroupAndSubtree': 'Usuń grupę i poddiagram',
        'hoverAddChildGroup': 'Dodaj grupkę córkę'
      },
      'messages': {
        'editProjectName': 'Edytuj nazwę projektu',
        'errProjectNameEmpty': 'Nazwa projektu nie może być pusta',
        'btnOK': 'Ok',
        'errDeleteRoot': 'Sorki. Usunięcie grupy macierzystej nie jest możliwe.',
        'confirmDeleteGroup': 'Czy rzeczywiście chcesz usunąć {{group-name}}?',
        'confirmDeleteGroupWithChildren': 'Czy rzeczywiście chcesz usunąć {{group-name}} i wszystko co za nimi idzie?',
        'saveAsInSafari': 'Zapisz jako:  (Uwaga przeglądarka Safari ma z tym pewne problemy, proszę zobacz GennMapper -> Pomoc)',
        'saveAs': 'Zapisz jako:',
        'confirmImportSubtreeOverwrite': 'Ostrzeżenie: Zaimportowanie poddiagramu nadpisze na grupę ({{group-name}}) i wszystko co za nią idzie. Czy chcesz kontynuować?',
        'errImport': 'Błąd w czasie importowania pliku.',
        'errImportWhatToCheck': 'Proszę sprawdź czy plik jest we właściwym formacie (przecinek rozdzielający wartości), czy grupa początkowa nie ma rodzica, i że pozostałe powiązania pomiędzy grupami są właściwe. Także sprawdź czy używasz właściwej wersji aplikacji.',
        'selectFile': 'Proszę wybierz plik',
        'errWrongFileType': 'Niewłaściwy typ pliku. Proszę zaimportuj xls, xlsx lub csv.'
      },
      'help': {
        'genmapperHelp': 'Genmapper Pomoc',
        'introContent': 'Witaj, ta aplikacja pomaga tworzyć mapy grup i kościołów. Modlę się, żeby pomagała w rozwoju królestwa Jezusa.',
        'importExportHeader': 'Importuj / Eksportuj',
        'importExportWarningChangesLost': 'Uwaga: Jeśli nie wyeksportujesz swojej pracy, wszystkie zmiany zostaną utracone zarówno przy odświeżaniu i zamykaniu tej strony.',
        'importExportContent': 'Możesz zaimportować pliki .xlsx i .xls (MS Excel) lub .csv (Comma Separated Values = wartości oddzielone przecinkami). <br> Możesz także zaimportować poddiagram klikając na daną grupę a potem na "Zaimportuj poddiagram".<br>',
        'exportSafariIssuePart1': 'Uwaga: Niektóre wersje przeglądarki Safari mają problem z eksportowaniem plików do formatu csv. Jeśli nowa zakładaka z blob otworzy się zamiast ściągnięcia pliku (zobacz przykład poniżej) ',
        'exportSafariIssuePart2': 'naciśnij Cmd + S, potem wpisz nazwę pliku kończącą się na .csv, wybierz Format: Page Source, i wtedy naciśnij Save',
        'exportToPdf': 'Aby wyeksportować do PDF, użyj Drukuj i potem zapisz jako PDF w Chrome czy Safari.',
        'panZoomHeader': 'Powiększanie/Pomniejszanie',
        'panZoomContent': 'Możesz powiększać i pomniejszać mapę kręcąc kółkiem myszki lub korzystając z przycisków po lewej.',
        'changelogHeader': 'Historia zmian i wersje',
        'changelogLink': 'Historia zmian',
        'genmapperVersion': 'Wersja Genmapper',
        'templateVersion': 'Wersja szablonu',
        'creditsHeader': 'Podziekowanie',
        'creditsThanks1': 'Dziękujemy Curtisowi Segeantowie za pomysł tworzenia map pokoleń i cenne wskazówki.',
        'creditsJavaScriptLibraries': 'Biblioteki JavaScript/CSS',
        'creditsIcons': 'Użyte ikony',
        'creditsAnd': 'i',
        'creditsCopyright': 'Copyright (c) 2016-2017 Daniel Vopalecky',
        'creditsLicense': 'MIT Licence',
        'creditsGithub': 'Zbiory Github',
        'creditsSuggestions': 'Sugestie i problemy z działaniem proszę wysyłać do daniel.vopalecky@seznam.cz',
        'btnOKStart': 'Zapraszamy!'
      }
    }
  },
  ro: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Proiect fără titlu',
        'languageName': 'Română',
        'language': 'Limba',
        'help': 'Ajutor',
        'helpAbout': 'Ajutor / Despre',
        'zooming': 'Zoom',
        'originalZoom': 'Zoom iniţial & poziţia',
        'zoomIn': 'A mări',
        'zoomOut': 'A micşora',
        'importExport': 'Import Export',
        'importXlsxCsv': 'Import XLXS / CSV',
        'exportCsv': 'Exportați CSV',
        'printing': 'Tipărire',
        'btnPrintVertical': 'Tiparire verticală pagini multiple',
        'btnPrintHorizontal': 'Tipărire orizontală pe o pagină'
      },
      'editGroup': {
        'editGroup': 'Editați grupul',
        'btnSubmit': 'Faceţi schimbări',
        'btnCancel': 'Anulare',
        'btnDelete': 'Ștergeți ramura',
        'btnImportSubtree': 'Subtree de import',
        'elementParent': 'Părinte',
        'notAvaliable': 'N / A',
        'hoverDeleteGroupAndSubtree': 'Ștergeți grupul & ramura',
        'hoverAddChildGroup': 'Adăugați grupul de copii'
      },
      'messages': {
        'editProjectName': 'Editați numele proiectului',
        'errProjectNameEmpty': 'Numele proiectului nu poate fi gol!',
        'btnOK': 'O.K',
        'errDeleteRoot': 'Scuze. Ștergerea grupului rădăcină nu este posibilă.',
        'confirmDeleteGroup': 'Chiar doriți să ștergeți {{groupName}}?',
        'confirmDeleteGroupWithChildren': 'Chiar doriți să ștergeți {{groupName}} și toți descendenții?',
        'saveAsInSafari': 'Salvează ca:<br>(Notă: browserul Safari are probleme cu exportul, vă rugăm să consultați GenMapper -> Ajutor pentru mai multe informații)',
        'saveAs': 'Salvează ca:',
        'confirmImportSubtreeOverwrite': 'Avertisment: importul ramurii va anula acest grup ({{groupName}}) și toți descendenții. Vrei sa continui?',
        'errImport': 'Eroare la importul fișierului.',
        'errImportWhatToCheck': 'Verificați dacă fișierul este în format corect (valori separate prin virgulă), că grupul rădăcină nu are părinte și că toate celelalte relații fac un arbore valid.<br>De asemenea, verificați dacă utilizați versiunea corectă a aplicației. ',
        'selectFile': 'Selectați un fișier',
        'errWrongFileType': 'Tip greșit de fișier. Vă rugăm să importați fișiere xls, xlsx sau csv.'
      },
      'help': {
        'genmapperHelp': 'Genmapper Ajutor',
        'introContent': 'Bună, această aplicaţie at trebui să vă ajute sa faceşi o hartă a generaţiilor unei biserici. Rugăciunea mea e să vă fie de ajutor în avansarea împărăţiei Domnului.',
        'importExportHeader': 'Import/Export',
        'importExportWarningChangesLost': 'Observaţie: Dacă nu exportaţi, toate schimbările o să fie pierdute când reîncărcaţi sau închideţi pagina.',
        'importExportContent': 'Puteţi importa un fişier .xlsx sau .xls (MS Excel) sau .cvs (Virgula separă valorile).<br>Puteţi importa o ramură dând click pe un anumit grup şi apoi flolosiţi butonul "Importaţi Ramura"<br>Exportul este posibil doar in formatul .cvs',
        'exportSafariIssuePart1': 'Observaţie: Unele versiuni de Safari au probleme cu exportul în .cvs Dacă un alt mesaj se deschide în loc de fişierul încărcat (vezi exemplus de mai jos)',
        'exportSafariIssuePart2': 'Apăsaţi Cmd + S, apoi introduceţi un nume de fişier care se termină cu .cvs, alegeţi Formatul: Pagina Iniţială, şi in final daţi Salvare',
        'exportToPdf': 'Pentru exportul in PDF, folosiţi butonul de tipărire şi apoi salvaţi în PDF în Crome sau Safari',
        'panZoomHeader': 'Glisare/Mărire',
        'panZoomContent': 'Puteţi glisa prin apasarea butonului de la mouse şi mariţi prin rotiţa mouse-ului sau folosind butoanele din stânga',
        'changelogHeader': 'Istoricul schimbărilor & versiunea',
        'changelogLink': 'Linkul pentru istoricul schimbărilor',
        'genmapperVersion': 'Genmapper versiunea',
        'templateVersion': 'Versiune modelului',
        'creditsHeader': 'Merite',
        'creditsSuggestions': 'Vă rugăm scrieţi problemele cu programul lui daniel.vopalecky@seznam.cz',
        'btnOKStart': 'Să începem'
      }
    }
  },
  ru: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Проект без названия',
        'languageName': 'Русский',
        'language': 'язык',
        'help': 'Помощь',
        'helpAbout': 'Помощь / О проекте',
        'zooming': 'Масштабирование',
        'originalZoom': 'Оригинальное масштабирование и положение',
        'zoomIn': 'Приблизить',
        'zoomOut': 'Уменьшить',
        'importExport': 'Импорт Экспорт',
        'importXlsxCsv': 'Импорт XLXS / CSV',
        'exportCsv': 'Экспорт CSV',
        'printing': 'печать',
        'btnPrintVertical': 'Печать вертикального многостраничного изображения',
        'btnPrintHorizontal': 'Печать по горизонтали на одну страницу'
      },
      'editGroup': {
        'editGroup': 'Редактировать Группу',
        'btnSubmit': 'Сохранить',
        'btnCancel': 'Отменить',
        'btnDelete': 'Удалить ветку',
        'btnImportSubtree': 'Импортировать ветку',
        'elementParent': 'Наставник',
        'notAvaliable': '',
        'hoverDeleteGroupAndSubtree': 'Удалить группу\\ветку',
        'hoverAddChildGroup': 'Добавить дочернюю группу'
      },
      'messages': {
        'editProjectName': 'Редактировать название проекта',
        'errProjectNameEmpty': 'Нельзя оставить без названия',
        'btnOK': '',
        'errDeleteRoot': 'Извините. Нельзя удалить материнскую группу',
        'confirmDeleteGroup': 'Хотите удалить группу ({{groupName}})?',
        'confirmDeleteGroupWithChildren': 'Хотите удалить группу ({{groupName}}) и все ветки?',
        'saveAsInSafari': 'Сохранить как: (Сафари имеет проблемы для экспортирования)',
        'saveAs': 'Сохранить как: (Сафари имеет проблемы для экспортирования)',
        'confirmImportSubtreeOverwrite': 'Предупреждение. Импортирование поддерева будет перезаписывать эту группу ({{groupName}}) и всех потомков. Вы хотите продолжить?',
        'errImport': 'Ошибка при импорте файла.',
        'errImportWhatToCheck': '«Убедитесь, что файл находится в правильном формате (значения, разделенные запятыми), что корневая группа не имеет родительского элемента и что все остальные отношения создают допустимое дерево.',
        'selectFile': 'Также убедитесь, что вы используете правильную версию приложения ».',
        'errWrongFileType': 'Выберите файл'
      },
      'help': {
        'genmapperHelp': 'Помощь Genmapper',
        'introContent': 'Привет, это приложение должно служить для картирования поколений простых церквей. Я молюсь, чтобы он помог вам продвинуть Царство Иисуса.',
        'importExportHeader': 'Импорт Экспорт',
        'importExportWarningChangesLost': '«Примечание. Если вы не экспортируете, все изменения будут потеряны при обновлении или закрытии страницы.',
        'importExportContent': 'Вы можете импортировать файлы .xlsx или .xls (MS Excel) или .csv (значения, разделенные запятой).<br>Вы также можете импортировать поддерево, щелкнув данную группу, а затем используя кнопку «Импортировать подтип».<br>Экспорт в настоящее время доступен только в формате .csv. ',
        'exportSafariIssuePart1': 'Примечание. Некоторые версии Safari имеют проблемы с экспортом в csv. Если вместо загруженной загрузки файла открывается новая вкладка с blob (см. Пример ниже)',
        'exportSafariIssuePart2': 'нажмите Cmd + S, затем введите окончание файла .csv, выберите «Формат: источник страницы» и, наконец, нажмите «Сохранить». проблема экспорта сафари "',
        'exportToPdf': 'Для экспорта в PDF используйте кнопки «Печать», а затем сохраните их как PDF в Chrome или Safari.',
        'panZoomHeader': 'Панорамирование / Масштабирование',
        'panZoomContent': 'Вы можете панорамировать, вытягивая карту и увеличивая колесо мыши или используя кнопки слева.',
        'changelogHeader': 'Изменения',
        'changelogLink': 'Глянь сюда',
        'genmapperVersion': 'Версия Genmapper',
        'templateVersion': 'Версия шаблона',
        'creditsHeader': 'кредиты',
        'creditsThanks1': 'Спасибо Кертису Сержанту за идею картирования поколений и за полезную обратную связь.',
        'creditsJavaScriptLibraries': 'Используемые библиотеки JavaScript/CSS',
        'creditsAnd': ',',
        'creditsCopyright': 'Copyright (c) 2016 - 2017 гг. Даниэль Вопалецкий',
        'creditsLicense': 'Лицензия на лицензию MIT',
        'creditsGithub': 'Репозиторий Github',
        'creditsSuggestions': 'Пожалуйста, присылайте предложения и ошибки на daniel.vopalecky@seznam.cz',
        'btnOKStart': 'Хорошо, давайте начнем!'
      }
    }
  },
  sq: {
    translation: {
      'menu': {
        'appName': 'GenMapper',
        'defaultProjectName': 'Projekt pa emer',
        'languageName': 'Shqip',
        'language': 'Gjuha',
        'help': 'Ndihme',
        'helpAbout': 'Ndihme / Rreth',
        'zooming': 'Zmadhoje',
        'originalZoom': 'Pozicioni dhe permasat normale',
        'zoomIn': 'Zmadho',
        'zoomOut': 'Zvogelo',
        'importExport': 'Importo/ Eksporto',
        'importXlsxCsv': 'Importo XLXS/CSV',
        'exportCsv': 'Eksporto CSV',
        'printing': 'Printimi',
        'btnPrintVertical': 'Printo vertikalisht ne disa faqe',
        'btnPrintHorizontal': 'Printo horizontalisht ne nje faqe'
      },
      'editGroup': {
        'editGroup': 'Modifiko Grupin',
        'btnSubmit': 'Dergo ndryshimet',
        'btnCancel': 'Anulo',
        'btnDelete': 'Fshije nen degen',
        'btnImportSubtree': 'Importo nen degen',
        'elementParent': 'Prind',
        'notAvaliable': 'N/A',
        'hoverDeleteGroupAndSubtree': 'Fshije grupin dhe degen nen te',
        'hoverAddChildGroup': 'Shto nje nen grup'
      },
      'messages': {
        'editProjectName': 'Modifiko emrin e Projektit',
        'errProjectNameEmpty': 'Emri i projektit nuk mund te lihet bosh',
        'btnOK': 'OK',
        'errDeleteRoot': 'Na vjen keq. Fshirja e grupit te pare nuk eshte e mundur',
        'confirmDeleteGroup': 'A je i sigurte se doni ta fshini grupin ({{groupName}})?',
        'confirmDeleteGroupWithChildren': 'A je i sigurte se doni ta fshini grupin ({{groupName}}) dhe pasardhesit e tij?',
        'saveAsInSafari': 'Ruaj si:<br>(Verejtje: Shfletuesi Safari ka probleme me eksportimin, prandaj hidhini nje sy GenMapper->Ndihme per me shume informacion',
        'saveAs': 'Ruaj si:',
        'confirmImportSubtreeOverwrite': 'Paralajmerim: Importimi i nen deges do te prishe kete grup ({{groupName}}) dhe gjithe pasardhesit e tij. A doni te vazhdoni perpara?',
        'errImport': 'Error gjate importimit te dokumentit',
        'errImportWhatToCheck': 'Ju lutemi kontrolloni që skedari është në formatin korrekt (vlera të ndara me presje), që grupi rrënjë nuk ka prind dhe që të gjitha marrëdhëniet e tjera të bëjnë një pemë të vlefshme. Gjithashtu kontrolloni qe perdornin versionin e sakte te aplikacionit',
        'selectFile': 'Ju lutem zgjidhni nje skedar',
        'errWrongFileType': 'Lloji i gabuar i skedarit. Ju lutem importoni xls, xlsx or csv files'
      },
      'help': {
        'creditsThanks1': 'Falenderojme Curtis Sergeant per idene e hartes se gjeneratave dhe per sugjerimet e vlefshme.',
        'creditsJavaScriptLibraries': 'Libraria e Javascript/CSS te perdorur:',
        'creditsAnd': ',',
        'creditsCopyright': 'Te drejtat e autorit (c) 2016 - 2017 Daniel Vopalecky',
        'creditsLicense': 'Licensuar me MIT Licence',
        'creditsGithub': 'Github repository',
        'creditsSuggestions': 'Ju lutem dergoni sugjerimet dhe problemet teknike tek daniel.vopalecky@seznam.cz',
        'btnOKStart': 'Ok, le te fillojme'
      }
    }
  }
}

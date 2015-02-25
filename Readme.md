### Structure

```
Resources/Private
  - Backend/*                  // Templates used in the Backend of TYPO3
  - Language/locallang.xlf     // english translations for the Frontend
  - Language/de.locallang.xlf  // german translations for the Frontend
  - Language/locallang_*.xlf   // english translations for the Backend
  - Messages/*                 // Templates for the Mails that are sent from the Controllers
  - Partials/*                 // Partials for the controller templates
  - Templates/*                // Templates used by the application/component/system controllers

Configuration
  - TCA/*                      // Contains configuration for the Backend to display the different Entities/Tables
  - TypoScript/*               // Contains some typo3 settings used by this extension
  - Extensions.ts              // Place to put TypoScipt for different Extensions

Classes
  - Controller/*               // controllers with actions that are display in the Frontend
  - Domain/                    // Models and Repositories representing the data in the tables
  - Import/                    // Various classes to import from a provided Excel file
  - Services/Mail              // class to easily send a mail based on a fluid template
  - ViewHelpers/*              // custom viewHelpers for frontend rendering
```

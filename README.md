# MDD

## Introduction
This project is an innovative mental health diagnosis tool that leverages the power of Natural Language Processing (NLP) and Machine Learning (ML). It is designed to understand and analyze inputs in the Arabic language, making it one of the few of its kind.

The core of this project lies in its use of PyTorch, Transformers, and AraBERT. PyTorch, an open-source machine learning library, provides the tensor computation and deep neural networks needed for this project. Transformers, a state-of-the-art Natural Language Processing library, offers numerous pre-trained models which are used to understand the semantics and context of the Arabic language. AraBERT, a version of BERT specifically trained for Arabic, is used to further enhance the understanding of the Arabic language inputs.

The goal of this project is to provide a potential mental disorder diagnosis based on a person's lifestyle and daily life inputs. The user can input any thoughts or feelings they have, and the tool will analyze these inputs and provide a potential diagnosis. This diagnosis is not meant to replace professional medical advice, but rather to provide an initial analysis that can help guide users to seek professional help if necessary.

This tool is unique in its approach to mental health diagnosis. By using NLP and ML, it can provide a quick and anonymous initial diagnosis, making mental health diagnosis more accessible to people who might otherwise avoid it due to stigma or other reasons.

## Objective

The primary objective of this project is to develop an accessible and efficient mental health diagnostic tool. This tool uses advanced Natural Language Processing and Machine Learning techniques to analyze Arabic language inputs related to a user's lifestyle and daily thoughts. 

Based on this analysis, the tool provides a potential mental disorder diagnosis. This diagnosis can serve as an initial step in mental health care, encouraging users to seek professional help if necessary. 

In addition, this project aims to reduce the stigma associated with mental health by providing an anonymous and private platform for users to express their thoughts and feelings.



## Prerequisites

Before you begin, ensure you have met the following requirements:

- You have installed the latest version of Python, PyTorch, Transformers, and Laravel.
- You have a `<Windows/Linux/Mac>` machine. State which OS is supported/required.
- You have read `<guide/link/documentation_related_to_project>`.

## Project Details

The project involved several steps to ensure the model was trained effectively and accurately. Here's a summary of the work done:

### Data Preprocessing

The dataset consisted of 40,000 rows with two columns. One column contained the user's story and daily life, averaging around 500 words each. The other column contained the disease name, which was mapped to one of four numbers. The data was preprocessed to be usable for the model.

### Model Training

The model was trained using AraBERT and Transformers. Some layers were frozen during the training process to prevent them from being updated. The `maxlen` parameter was set to 512 to accommodate the tokenization of cells containing around 500 words each.

To improve the model's performance, a dropout layer and batch normalization were added. These additions helped to prevent overfitting and ensure that the model generalizes well to new data.

After weeks of training, a weights file of 500 megabytes was obtained. This file is used to correctly predict the disease based on the user's input.


# Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Acknowledgements

This project would not have been possible without the help and support of several individuals. I would like to express my deepest appreciation to:

- https://github.com/HadoolMohamma : My project partner who worked alongside me on the Natural Language Processing section of this project. You can find more about their work here.
- Ali Asfour: My project partner who worked on the web development section of this project.




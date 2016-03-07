USE screening;

INSERT INTO people
    (first_name, middle_name, last_name, url)
  VALUES
    ('Barzan', NULL, 'Mozafari', 'http://web.eecs.umich.edu/~mozafari/'),
    ('Karthik',NULL, 'Duraisamy', 'http://www.engin.umich.edu/college/about/people/profiles/a-to-e/karthik-duraisamy'),
    ('Krishna',NULL,  'Garikipati', 'http://www-personal.umich.edu/~krishna/'),
    ('Mohammad', 'Hasan', 'Savoji', NULL);

INSERT INTO news
    (title, content)
  VALUES
    ('$3.46M to combine supercomputer simulations with big data 08/15/2015',
    'NSF and University of Michigan have jointly sponsored our ConFlux project: a massively parallel system for solving open problems in computational physics using large-scale machine learning! See the official news release here: http://www.engin.umich.edu/college/about/news/stories/2015/september/supercomputer-simulations-with-big-data');

INSERT INTO website
    (url)
  VALUES
    ('https://github.com/mozafari/cliffguard');

INSERT INTO publication
    (pub_name, pdate, url, award)
  VALUES
    ('A New Collision Resistant Hash Function based on Optimum Dimensionality Reduction using Walsh-Hadamard Transform',
    '2006-12-18', NULL, NULL);


INSERT INTO project
    (pname, pdescp, pcontent, url)
  VALUES
    ('Conflux',
    'A Low-Latency Data Platform for Computational Physics', 'This project develops an instrument, called ConFlux, hosted at the University of Michigan (UM), specifically designed to enable High Performance Computing (HPC) clusters to communicate seamlessly and at interactive speeds with data-intensive operations. The project establishes a hardware and software ecosystem to enable large scale data-driven modeling of multiscale physical systems. ConFlux will produce advances in predictive modeling in several disciplines including turbulent flows, materials physics, cosmology, climate science and cardiovascular flow modeling. A wide range of phenomena exhibit emergent behavior that makes modeling very challenging. In this project, physics-constrained data-driven modeling approaches are pursued to account for the underlying complexity. These techniques require HPC applications (running on external clusters) to interact with large data sets at run time. ConFlux provides low latency communications for in- and out-of-core data, cross-platform storage, as well as high throughput interconnects and massive memory allocations. The file-system and scheduler natively handle extreme-scale machine learning and traditional HPC modules in a tightly integrated workflow---rather than in segregated operations--leading to significantly lower latencies, fewer algorithmic barriers and less data movement. The funding for this project is $3.46M, out of which NSF and University of Michigan have each generously provided $2.4M and $1M, respectively.',
     'http://web.eecs.umich.edu/~mozafari/php/projects.php#Conflux');

INSERT INTO people_publish
    (people_id, pub_id)
  VALUES
    (1, 1),
    (4, 1);

INSERT INTO people_project
    (people_id, project_id)
  VALUES
    (1, 1),
    (2, 1),
    (3, 1);

INSERT INTO project_publish
    (project_id, pub_id)
  VALUES
    (1, 1);

INSERT INTO project_news
    (project_id, news_id)
  VALUES
    (1, 1);



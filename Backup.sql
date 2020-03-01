--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.17
-- Dumped by pg_dump version 12.0

-- Started on 2020-02-29 21:20:44

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2139 (class 0 OID 24631)
-- Dependencies: 187
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.account (user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) FROM stdin;
1	user1	user1	John	Smith	Male	3334445555	221 Test Street	user1@test.com
2	user2	user2	John	Doe	Male	1112225544	331 Test Street	user2@test.com
3	user3	user3	Jane	Doe	Female	9996665555	5534 Test Street	user3@test.com
7	newuser	1234	new	user	option1	123123123	123 xxx street	newuser@gmail.com
\.


--
-- TOC entry 2137 (class 0 OID 24601)
-- Dependencies: 185
-- Data for Name: card_info; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.card_info (card_id, user_id, card_type, card_number) FROM stdin;
1	1	Credit	4567486876
2	1	Credit	7685535123
3	1	Credit	7897897654
4	1	Savings	7897845458
5	1	Savings	4534546789
6	1	Cash	1234568742
7	2	Cash	4501231378
8	1	Loan	1231238751
9	2	Credit	8784561231
10	3	Credit	4561237897
\.


--
-- TOC entry 2138 (class 0 OID 24609)
-- Dependencies: 186
-- Data for Name: transaction_info; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow) FROM stdin;
2	2	AA	20201103	\N	\N	20
3	3	SS	20191101	\N	85	\N
4	4	ZZ	20180605	\N	12	\N
5	5	XX	20190706	\N	333	\N
6	6	EE	20130516	\N	\N	15
7	1	Junk	20200202	Withdraw	542	\N
8	1	Another Junk	20200715	\N	77	12
1	1	No Title	20200105	Deposit	\N	150
\.


-- Completed on 2020-02-29 21:20:44

--
-- PostgreSQL database dump complete
--


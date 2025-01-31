<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Bapelitbang</title>

        <style>

table {
    caption-side: bottom;
    border-collapse: collapse;
}
.table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-green: #00ff22;
    --bs-green-rgb: 0, 255, 34;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #000000;
}
.table > :not(caption) > * > * {
    padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
    vertical-align: inherit;
}
.table-bordered tr > th,
.table-bordered tr > td{
    border: black 1px solid;
}
.table > thead {
    vertical-align: bottom;
}
.table > :not(:first-child) {
    border-top: 2px solid currentColor;
}
.caption-top {
    caption-side: top;
}
.table-sm > :not(caption) > * > * {
    padding: 0.25rem 0.25rem;
}
.table-bordered > :not(caption) > * {
    border-width: 1px 0 black;
}
.table-bordered > :not(caption) > * > * {
    border-width: 0 1px black;
}
.table-borderless > :not(caption) > * > * {
    border-bottom-width: 0;
}
.table-borderless > :not(:first-child) {
    border-top-width: 0;
}
.table-striped > tbody > tr:nth-of-type(odd) > * {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color);
}
.text-start {
    text-align: left !important;
}
.text-end {
    text-align: right !important;
}
.text-center {
    text-align: center !important;
}
.text-wrap {
    white-space: normal !important;
}
.p-0 {
    padding: 0 !important;
}
.p-1 {
    padding: 0.25rem !important;
}
.p-2 {
    padding: 0.5rem !important;
}
.p-3 {
    padding: 1rem !important;
}
.p-4 {
    padding: 1.5rem !important;
}
.p-5 {
    padding: 3rem !important;
}
.px-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
}
.px-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
}
.px-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
}
.px-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
.px-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
}
.py-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}
.py-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
}
.py-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
}
.py-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
.py-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
}
.py-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.m-0 {
    margin: 0 !important;
}
.m-1 {
    margin: 0.25rem !important;
}
.m-2 {
    margin: 0.5rem !important;
}
.m-3 {
    margin: 1rem !important;
}
.m-4 {
    margin: 1.5rem !important;
}
.m-5 {
    margin: 3rem !important;
}
.m-auto {
    margin: auto !important;
}
.mx-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
}
.mx-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
}
.mx-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
}
.mx-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
}
.mx-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
}
.mx-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
}
.mx-auto {
    margin-right: auto !important;
    margin-left: auto !important;
}
.my-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}
.my-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
}
.my-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
}
.my-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
}
.my-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
}
.my-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
}
.mb-3 {
    margin-bottom: 1rem !important;
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.row > * {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-top: var(--bs-gutter-y);
}
.col {
    flex: 1 0 0%;
}
.row-cols-auto > * {
    flex: 0 0 auto;
    width: auto;
}
.row-cols-1 > * {
    flex: 0 0 auto;
    width: 100%;
}
.row-cols-2 > * {
    flex: 0 0 auto;
    width: 50%;
}
.row-cols-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
}
.row-cols-4 > * {
    flex: 0 0 auto;
    width: 25%;
}
.row-cols-5 > * {
    flex: 0 0 auto;
    width: 20%;
}
.row-cols-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
}
.container-body {
    display: flex;
}

content {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-top: var(--bs-gutter-y);
}
footer {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));
    bottom: 0;
    width: 100%;
    min-height: 60px; /* Height of the footer */
    background: #6cf;
}
.col-auto {
    flex: 0 0 auto;
    width: auto;
}
.col-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
}
.col-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
}
.col-3 {
    flex: 0 0 auto;
    width: 25%;
}
.col-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}
.col-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
}
.col-6 {
    flex: 0 0 auto;
    width: 50%;
}
.col-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
}
.col-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.col-9 {
    flex: 0 0 auto;
    width: 75%;
}
.col-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
}
.col-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
}
.col-12 {
    flex: 0 0 auto;
    width: 100%;
}
.offset-1 {
    margin-left: 8.33333333%;
}
.offset-2 {
    margin-left: 16.66666667%;
}
.offset-3 {
    margin-left: 25%;
}
.offset-4 {
    margin-left: 33.33333333%;
}
.offset-5 {
    margin-left: 41.66666667%;
}
.offset-6 {
    margin-left: 50%;
}
.offset-7 {
    margin-left: 58.33333333%;
}
.offset-8 {
    margin-left: 66.66666667%;
}
.offset-9 {
    margin-left: 75%;
}
.offset-10 {
    margin-left: 83.33333333%;
}
.offset-11 {
    margin-left: 91.66666667%;
}
.g-0,
.gx-0 {
    --bs-gutter-x: 0;
}
.g-0,
.gy-0 {
    --bs-gutter-y: 0;
}
.g-1,
.gx-1 {
    --bs-gutter-x: 0.25rem;
}
.g-1,
.gy-1 {
    --bs-gutter-y: 0.25rem;
}
.g-2,
.gx-2 {
    --bs-gutter-x: 0.5rem;
}
.g-2,
.gy-2 {
    --bs-gutter-y: 0.5rem;
}
.g-3,
.gx-3 {
    --bs-gutter-x: 1rem;
}
.g-3,
.gy-3 {
    --bs-gutter-y: 1rem;
}
.g-4,
.gx-4 {
    --bs-gutter-x: 1.5rem;
}
.g-4,
.gy-4 {
    --bs-gutter-y: 1.5rem;
}
.g-5,
.gx-5 {
    --bs-gutter-x: 3rem;
}
.g-5,
.gy-5 {
    --bs-gutter-y: 3rem;
}
@media (min-width: 576px) {
    .col-sm {
        flex: 1 0 0%;
    }
    .row-cols-sm-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-sm-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-sm-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-sm-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-sm-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-sm-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-sm-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-sm-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-sm-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-sm-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-sm-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-sm-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-sm-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-sm-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-sm-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-sm-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-sm-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-sm-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-sm-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-sm-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-sm-0 {
        margin-left: 0;
    }
    .offset-sm-1 {
        margin-left: 8.33333333%;
    }
    .offset-sm-2 {
        margin-left: 16.66666667%;
    }
    .offset-sm-3 {
        margin-left: 25%;
    }
    .offset-sm-4 {
        margin-left: 33.33333333%;
    }
    .offset-sm-5 {
        margin-left: 41.66666667%;
    }
    .offset-sm-6 {
        margin-left: 50%;
    }
    .offset-sm-7 {
        margin-left: 58.33333333%;
    }
    .offset-sm-8 {
        margin-left: 66.66666667%;
    }
    .offset-sm-9 {
        margin-left: 75%;
    }
    .offset-sm-10 {
        margin-left: 83.33333333%;
    }
    .offset-sm-11 {
        margin-left: 91.66666667%;
    }
    .g-sm-0,
    .gx-sm-0 {
        --bs-gutter-x: 0;
    }
    .g-sm-0,
    .gy-sm-0 {
        --bs-gutter-y: 0;
    }
    .g-sm-1,
    .gx-sm-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-sm-1,
    .gy-sm-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-sm-2,
    .gx-sm-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-sm-2,
    .gy-sm-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-sm-3,
    .gx-sm-3 {
        --bs-gutter-x: 1rem;
    }
    .g-sm-3,
    .gy-sm-3 {
        --bs-gutter-y: 1rem;
    }
    .g-sm-4,
    .gx-sm-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-sm-4,
    .gy-sm-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-sm-5,
    .gx-sm-5 {
        --bs-gutter-x: 3rem;
    }
    .g-sm-5,
    .gy-sm-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 768px) {
    .col-md {
        flex: 1 0 0%;
    }
    .row-cols-md-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-md-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-md-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-md-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-md-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-md-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-md-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-md-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-md-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-md-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-md-2_5 {
        flex: 0 0 auto;
        width: 20%;
    }
    .col-md-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-md-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-md-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-md-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-md-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-md-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-md-9_5 {
        flex: 0 0 auto;
        width: 80%;
    }
    .col-md-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-md-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-md-0 {
        margin-left: 0;
    }
    .offset-md-1 {
        margin-left: 8.33333333%;
    }
    .offset-md-2 {
        margin-left: 16.66666667%;
    }
    .offset-md-3 {
        margin-left: 25%;
    }
    .offset-md-4 {
        margin-left: 33.33333333%;
    }
    .offset-md-5 {
        margin-left: 41.66666667%;
    }
    .offset-md-6 {
        margin-left: 50%;
    }
    .offset-md-7 {
        margin-left: 58.33333333%;
    }
    .offset-md-8 {
        margin-left: 66.66666667%;
    }
    .offset-md-9 {
        margin-left: 75%;
    }
    .offset-md-10 {
        margin-left: 83.33333333%;
    }
    .offset-md-11 {
        margin-left: 91.66666667%;
    }
    .g-md-0,
    .gx-md-0 {
        --bs-gutter-x: 0;
    }
    .g-md-0,
    .gy-md-0 {
        --bs-gutter-y: 0;
    }
    .g-md-1,
    .gx-md-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-md-1,
    .gy-md-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-md-2,
    .gx-md-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-md-2,
    .gy-md-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-md-3,
    .gx-md-3 {
        --bs-gutter-x: 1rem;
    }
    .g-md-3,
    .gy-md-3 {
        --bs-gutter-y: 1rem;
    }
    .g-md-4,
    .gx-md-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-md-4,
    .gy-md-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-md-5,
    .gx-md-5 {
        --bs-gutter-x: 3rem;
    }
    .g-md-5,
    .gy-md-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 992px) {
    .col-lg {
        flex: 1 0 0%;
    }
    .row-cols-lg-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-lg-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-lg-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-lg-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-lg-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-lg-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-lg-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-lg-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-lg-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-lg-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-lg-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-lg-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-lg-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-lg-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-lg-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-lg-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-lg-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-lg-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-lg-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-lg-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-lg-0 {
        margin-left: 0;
    }
    .offset-lg-1 {
        margin-left: 8.33333333%;
    }
    .offset-lg-2 {
        margin-left: 16.66666667%;
    }
    .offset-lg-3 {
        margin-left: 25%;
    }
    .offset-lg-4 {
        margin-left: 33.33333333%;
    }
    .offset-lg-5 {
        margin-left: 41.66666667%;
    }
    .offset-lg-6 {
        margin-left: 50%;
    }
    .offset-lg-7 {
        margin-left: 58.33333333%;
    }
    .offset-lg-8 {
        margin-left: 66.66666667%;
    }
    .offset-lg-9 {
        margin-left: 75%;
    }
    .offset-lg-10 {
        margin-left: 83.33333333%;
    }
    .offset-lg-11 {
        margin-left: 91.66666667%;
    }
    .g-lg-0,
    .gx-lg-0 {
        --bs-gutter-x: 0;
    }
    .g-lg-0,
    .gy-lg-0 {
        --bs-gutter-y: 0;
    }
    .g-lg-1,
    .gx-lg-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-lg-1,
    .gy-lg-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-lg-2,
    .gx-lg-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-lg-2,
    .gy-lg-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-lg-3,
    .gx-lg-3 {
        --bs-gutter-x: 1rem;
    }
    .g-lg-3,
    .gy-lg-3 {
        --bs-gutter-y: 1rem;
    }
    .g-lg-4,
    .gx-lg-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-lg-4,
    .gy-lg-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-lg-5,
    .gx-lg-5 {
        --bs-gutter-x: 3rem;
    }
    .g-lg-5,
    .gy-lg-5 {
        --bs-gutter-y: 3rem;
    }
}
@media (min-width: 1200px) {
    .col-xl {
        flex: 1 0 0%;
    }
    .row-cols-xl-auto > * {
        flex: 0 0 auto;
        width: auto;
    }
    .row-cols-xl-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }
    .row-cols-xl-2 > * {
        flex: 0 0 auto;
        width: 50%;
    }
    .row-cols-xl-3 > * {
        flex: 0 0 auto;
        width: 33.3333333333%;
    }
    .row-cols-xl-4 > * {
        flex: 0 0 auto;
        width: 25%;
    }
    .row-cols-xl-5 > * {
        flex: 0 0 auto;
        width: 20%;
    }
    .row-cols-xl-6 > * {
        flex: 0 0 auto;
        width: 16.6666666667%;
    }
    .col-xl-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .col-xl-1 {
        flex: 0 0 auto;
        width: 8.33333333%;
    }
    .col-xl-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
    }
    .col-xl-3 {
        flex: 0 0 auto;
        width: 25%;
    }
    .col-xl-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }
    .col-xl-5 {
        flex: 0 0 auto;
        width: 41.66666667%;
    }
    .col-xl-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    .col-xl-7 {
        flex: 0 0 auto;
        width: 58.33333333%;
    }
    .col-xl-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }
    .col-xl-9 {
        flex: 0 0 auto;
        width: 75%;
    }
    .col-xl-10 {
        flex: 0 0 auto;
        width: 83.33333333%;
    }
    .col-xl-11 {
        flex: 0 0 auto;
        width: 91.66666667%;
    }
    .col-xl-12 {
        flex: 0 0 auto;
        width: 100%;
    }
    .offset-xl-0 {
        margin-left: 0;
    }
    .offset-xl-1 {
        margin-left: 8.33333333%;
    }
    .offset-xl-2 {
        margin-left: 16.66666667%;
    }
    .offset-xl-3 {
        margin-left: 25%;
    }
    .offset-xl-4 {
        margin-left: 33.33333333%;
    }
    .offset-xl-5 {
        margin-left: 41.66666667%;
    }
    .offset-xl-6 {
        margin-left: 50%;
    }
    .offset-xl-7 {
        margin-left: 58.33333333%;
    }
    .offset-xl-8 {
        margin-left: 66.66666667%;
    }
    .offset-xl-9 {
        margin-left: 75%;
    }
    .offset-xl-10 {
        margin-left: 83.33333333%;
    }
    .offset-xl-11 {
        margin-left: 91.66666667%;
    }
    .g-xl-0,
    .gx-xl-0 {
        --bs-gutter-x: 0;
    }
    .g-xl-0,
    .gy-xl-0 {
        --bs-gutter-y: 0;
    }
    .g-xl-1,
    .gx-xl-1 {
        --bs-gutter-x: 0.25rem;
    }
    .g-xl-1,
    .gy-xl-1 {
        --bs-gutter-y: 0.25rem;
    }
    .g-xl-2,
    .gx-xl-2 {
        --bs-gutter-x: 0.5rem;
    }
    .g-xl-2,
    .gy-xl-2 {
        --bs-gutter-y: 0.5rem;
    }
    .g-xl-3,
    .gx-xl-3 {
        --bs-gutter-x: 1rem;
    }
    .g-xl-3,
    .gy-xl-3 {
        --bs-gutter-y: 1rem;
    }
    .g-xl-4,
    .gx-xl-4 {
        --bs-gutter-x: 1.5rem;
    }
    .g-xl-4,
    .gy-xl-4 {
        --bs-gutter-y: 1.5rem;
    }
    .g-xl-5,
    .gx-xl-5 {
        --bs-gutter-x: 3rem;
    }
    .g-xl-5,
    .gy-xl-5 {
        --bs-gutter-y: 3rem;
    }
}
.border {
    border: 1px solid #dee2e6 !important;
}
.border-0 {
    border: 0 !important;
}
.border-top {
    border-top: 1px solid #dee2e6 !important;
}
.border-top-0 {
    border-top: 0 !important;
}
.border-end {
    border-right: 1px solid #dee2e6 !important;
}
.border-end-0 {
    border-right: 0 !important;
}
.border-bottom {
    border-bottom: 1px solid #dee2e6 !important;
}
.border-bottom-0 {
    border-bottom: 0 !important;
}
.border-start {
    border-left: 1px solid #dee2e6 !important;
}
.border-start-0 {
    border-left: 0 !important;
}
.border-primary {
    border-color: #0d6efd !important;
}
.border-secondary {
    border-color: #6c757d !important;
}
.border-success {
    border-color: #198754 !important;
}
.border-teal {
    border-color: #20c997 !important;
}
.border-info {
    border-color: #0dcaf0 !important;
}
.border-warning {
    border-color: #ffc107 !important;
}
.border-orange {
    border-color: #fd7e14 !important;
}
.border-danger {
    border-color: #dc3545 !important;
}
.border-light {
    border-color: #f8f9fa !important;
}
.border-dark {
    border-color: #212529 !important;
}
.border-white {
    border-color: #fff !important;
}
.border-1 {
    border-width: 1px !important;
}
.border-2 {
    border-width: 2px !important;
}
.border-3 {
    border-width: 3px !important;
}
.border-4 {
    border-width: 4px !important;
}
.border-5 {
    border-width: 5px !important;
}
.fs-1 {
    font-size: calc(1.375rem + 1.5vw) !important;
}
.fs-2 {
    font-size: calc(1.325rem + 0.9vw) !important;
}
.fs-3 {
    font-size: calc(1.3rem + 0.6vw) !important;
}
.fs-4 {
    font-size: calc(1.275rem + 0.3vw) !important;
}
.fs-5 {
    font-size: 1.25rem !important;
}
.fs-6 {
    font-size: 1rem !important;
}
.fs-7 {
    font-size: 0.75rem !important;
}
.fs-8 {
    font-size: 0.65rem !important;
}
.fs-9 {
    font-size: 0.55rem !important;
}
.pt-0 {
    padding-top: 0 !important;
}
.pt-1 {
    padding-top: 0.25rem !important;
}
.pt-2 {
    padding-top: 0.5rem !important;
}
.pt-3 {
    padding-top: 1rem !important;
}
.pt-4 {
    padding-top: 1.5rem !important;
}
.pt-5 {
    padding-top: 3rem !important;
}
.align-baseline {
    vertical-align: baseline !important;
}
.align-top {
    vertical-align: top !important;
}
.align-middle {
    vertical-align: middle !important;
}
.align-bottom {
    vertical-align: bottom !important;
}
.page-break{
    page-break-after: always;
}
.tbold{
    font-weight: bold;
}
.w-25 {
    width: 25% !important;
}
.w-30 {
    width: 30% !important;
}
.w-40 {
    width: 40% !important;
}
.w-50 {
    width: 50% !important;
}
.w-75 {
    width: 75% !important;
}
.w-100 {
    width: 100% !important;
}
.w-5 {
    width: 5% !important;
}
.w-10 {
    width: 10% !important;
}
.w-15 {
    width: 15% !important;
}
.w-20 {
    width: 20% !important;
}
.w-45 {
    width: 45% !important;
}
.bb-0{
    border-bottom: 0; 
}
.bg-green {background-color: #00ff22;}
.bg-info {background-color: #0dcaf0;}
.bg-orange {background-color: #fd7e14;}
        </style>
    </head>
    <body>
        @foreach ($progbid->kegprog as $kegprog)
        
            @foreach ($kegprog->subkeg as $subkeg)
            
                @if($jenis == 'pdf')

                    @php
                        $jmlkak = 0;
                        $jmlkak += $subkeg->kak->count();
                    @endphp

                    @if ($jmlkak > 0)

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-center">Kerangka Acuan Kerja Aktivitas Subkegiatan</h1>
                            <div class="row "></div>
                            <div class="btn-toolbar mb-2 mb-md-0">
                            </div>
                        </div>
                        
                        <div class="mb-3 pb-3">
                            <table class="table table-borderless fs-6 m-0 p-0 align-middle mb-3 pb-3">
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">Urusan Pemerintah</td>
                                    <td>: [{{ $urusan->kode }}] {{ $urusan->ket }}</td>
                                </tr>
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">bidang Urusan</td>
                                    <td>: [{{ $bidurus->kode }}] {{ $bidurus->ket }}</td>
                                </tr>
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">Organisasi</td>
                                    <td>: [{{ $skpd->kode }}] {{ $skpd->name }}</td>
                                </tr>
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">Program</td>
                                    <td>: [{{ $progbid->kode }}] {{ $progbid->ket }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Capaian Program</td>
                                    <td>:</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Indikator</td>
                                    <td>: {{ $subkeg->kak->first()->icapaianprog??'' }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Target</td>
                                    <td>: {{ $subkeg->kak->first()->volcapprog??'' }} {{ $subkeg->kak->first()->satcapprog??'' }}</td>
                                </tr>
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">Kegiatan</td>
                                    <td>: [{{ $kegprog->kode }}] {{ $kegprog->ket }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Hasil Kegiatan</td>
                                    <td>:</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Indikator</td>
                                    <td>: {{ $subkeg->kak->first()->ihaske??'' }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Target</td>
                                    <td>: {{ $subkeg->kak->first()->volhaskeg??'' }} {{ $subkeg->kak->first()->sathaskeg??'' }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Keluaran Kegiatan</td>
                                    <td>:</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Indikator</td>
                                    <td>: {{ $subkeg->kak->first()->ikeluarankeg??'' }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Target</td>
                                    <td>: {{ $subkeg->kak->first()->volkelkeg??'' }} {{ $subkeg->kak->first()->subkeg->satuan->satuan??'' }}</td>
                                </tr>
                                <tr class="tbold p-0 m-1">
                                    <td colspan="2">Subkegiatan</td>
                                    <td>: [{{ $subkeg->kode }}] {{ $subkeg->ket }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Output Subkegiatan</td>
                                    <td>:</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Indikator</td>
                                    <td>: {{ $subkeg->kak->first()->subkeg->indikator??'' }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Target</td>
                                    <td>: {{ $subkeg->kak->first()->tarsubkeg??'' }} {{ $subkeg->satuan->satuan }}</td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Jumlah Anggaran Sub-kegiatan</td>
                                    <td>: Rp.
                                        @php
                                            $total_subkeg = 0;
                                        @endphp
                                        @foreach ($subkeg->kak as $kak)
                                            @if ($periode->sesi == 'rka')
                                                @php
                                                    $total_subkeg += $kak->kebutuhanakt->sum('total_rka');
                                                @endphp
                                            @elseif ($periode->sesi == 'kuappas')
                                                @php
                                                    $total_subkeg += $kak->kebutuhanakt->sum('total_kuappas');
                                                @endphp
                                            @elseif ($periode->sesi == 'apbd')
                                                @php
                                                    $total_subkeg += $kak->kebutuhanakt->sum('total_apbd');
                                                @endphp
                                            @elseif ($periode->sesi == 'final')
                                                @php
                                                    $total_subkeg += $kak->kebutuhanakt->sum('total_final');
                                                @endphp
                                            @endif
                                        @endforeach
                                        
                                        {{ str_replace(',', '.', number_format($total_subkeg)) }}
                                    </td>
                                </tr>
                                <tr class="p-0 m-1">
                                    <td></td>
                                    <td class="p-0 m-0">Sub Unit</td>
                                    <td>: {{ $kak->bidangsek->name }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="page-break"></div>
                        @foreach ($subkeg->kak as $kak)
                                <div class="mb-3 pb-3">
                                    <table class="table table-borderless fs-7 m-0 p-0 align-middle mb-3 pb-3">
                                        <tr class="tbold p-0 m-1">
                                            <td colspan="2">Aktivitas</td>
                                            <td class="w-75">: {{ $kak->ket }}</td>
                                        </tr>
                                        @if ($kak->kelompokbelanja_id == 2 || $kak->kelompokbelanja_id == 3)
                                        
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Pendekatan Belanja</td>
                                                <td>: {{ $kak->kelompokbelanja->ket }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Jumlah Anggaran</td>
                                                <td>: Rp. 
                                                    @if ($periode->sesi == 'rka')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                                                    @elseif ($periode->sesi == 'kuappas')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                                                    @elseif ($periode->sesi == 'apbd')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                                                    @elseif ($periode->sesi == 'final')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Sub Unit</td>
                                                <td>: {{ $kak->bidangsek->name??'' }}</td>
                                            </tr>

                                        @else
                                            
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Keluaran Aktivitas</td>
                                                <td>: {{ $kak->ket??'' }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Indikator</td>
                                                <td>: {{ $kak->outakti }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Target</td>
                                                <td>: {{ $kak->voloutakti }} {{ $kak->satoutakti }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Pendekatan Belanja</td>
                                                <td>: {{ $kak->kelompokbelanja->ket }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Jumlah Anggaran</td>
                                                <td>: Rp. 
                                                    @if ($periode->sesi == 'rka')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                                                    @elseif ($periode->sesi == 'kuappas')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                                                    @elseif ($periode->sesi == 'apbd')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                                                    @elseif ($periode->sesi == 'final')
                                                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Waktu Pelaksanaan</td>
                                                <td>: {{ date('d-m-Y', strtotime($kak->dari)) }} s/d {{ date('d-m-Y', strtotime($kak->sampai)) }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Lokasi</td>
                                                <td>: {{ $kak->lokasikak->ket??'' }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Deskripsi Aktivtas</td>
                                                <td>: {{ $kak->deskrip }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Bagian/Bidang/Sekretariat/UPTD</td>
                                                <td>: {{ $kak->bidangsek->name??'' }}</td>
                                            </tr>
                                            <tr class="p-0 m-1">
                                                <td></td>
                                                <td class="p-0 m-0">Subbag/Seksi/Sub-koordinator</td>
                                                <td>: {{ $kak->subbagdkk }}</td>
                                            </tr>

                                        @endif
                                        
                                    </table>
                                </div>
                            
                            
                            @if ($kak->kelompokbelanja_id == 2)
                                <div class="table-responsive col-lg-12">
                                    
                                    <table class="table table-bordered table-striped table-sm" id="tbl">
                                        <thead>
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Rincian Gaji</th>
                                            <th scope="col">Anggaran</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        <tr class="fs-7 tbold">
                                            <td colspan="2">Total</td>
                                            <td class="text-end">
                                            @if ($periode->sesi == 'rka')
                                                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                                            @elseif ($periode->sesi == 'kuappas')
                                                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                                            @elseif ($periode->sesi == 'apbd')
                                                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                                            @elseif ($periode->sesi == 'final')
                                                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                                            @endif
                                            </td>
                                        </tr>
                                        @foreach ($kak->kebutuhanakt as $keb)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $keb->uraian_lain }}</td>
                                                <td class="text-end">
                                                @if ($periode->sesi == 'rka')
                                                    {{ str_replace(',', '.', number_format($keb->total_rka)) }}
                                                @elseif ($periode->sesi == 'kuappas')
                                                    {{ str_replace(',', '.', number_format($keb->total_kuappas)) }}
                                                @elseif ($periode->sesi == 'apbd')
                                                    {{ str_replace(',', '.', number_format($keb->total_apbd)) }}
                                                @elseif ($periode->sesi == 'final')
                                                    {{ str_replace(',', '.', number_format($keb->total_final)) }}
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            
                            @elseif($kak->kelompokbelanja_id == 3)
                            
                                <div class="table-responsive col-lg-12">
                                    
                                    <table class="table table-bordered border-dark table-sm" id="tblkak">
                                        <thead>
                                            <tr class="text-center fs-7 text-wrap">
                                            <th scope="col" rowspan="2" class="align-middle">No</th>
                                            <th scope="col" colspan="5">Kebutuhan Belanja</th>
                                            </tr>
                                            <tr class="text-center fs-7 text-wrap">
                                            <th class="w-30" class="align-middle">Uraian Kebutuhan</th>
                                            <th class="align-middle">Vol</th>
                                            <th class="align-middle">Satuan</th>
                                            <th class="align-middle">Harga</th>
                                            <th class="align-middle">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr class="fs-7 bg-green">
                                            <th colspan="4" class="text-start">Total Anggaran</th>
                                            <th class="text-end" colspan="2">
                                                @php
                                                $total_kak = 0;
                                                foreach ($kak->kebutuhanakt as $keb) {
                                                    if($periode->sesi == 'rka'){
                                                        $total_kak += $keb->total_rka;
                                                    }else if($periode->sesi == 'kuappas'){
                                                        $total_kak += $keb->total_kuappas;
                                                    }else if($periode->sesi == 'apbd'){
                                                        $total_kak += $keb->total_apbd;
                                                    }else if($periode->sesi == 'final'){
                                                        $total_kak += $keb->total_final;
                                                    }
                                                    }
                                                echo str_replace(',', '.', number_format($total_kak))
                                                @endphp
                                            </th>
                                            </tr>
                                            @foreach ($kak->kebutuhanakt as $keb)

                                                <tr class="f-8">
                                                    <td class="fs-7 text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="w-40 p-0 m-0 fs-7">
                                                        @if ($keb->tipe_keb == 'ssh')
                                                            {{ $keb->ssh->ket }}
                                                        @elseif ($keb->tipe_keb == 'usulanssh')
                                                            {{ $keb->usulanssh->ket }}
                                                        @elseif ($keb->tipe_keb == 'sbu')
                                                            {{ $keb->sbu->ket }}
                                                        @elseif ($keb->tipe_keb == 'usulansbu')
                                                            {{ $keb->usulansbu->ket }}
                                                        @elseif ($keb->tipe_keb == 'other')
                                                            {{ $keb->uraian_lain }}
                                                        @endif
                                                    </td>
                                                    <td class="p-0 m-0 fs-7 text-center align-middle">
                                                        @if ($periode->sesi == 'rka')
                                                            {{ str_replace('.', ',', $keb->jml_rka) }}
                                                        @elseif ($periode->sesi == 'kuappas')
                                                            {{ str_replace('.', ',', $keb->jml_kuappas) }}
                                                        @elseif ($periode->sesi == 'apbd')
                                                            {{ str_replace('.', ',', $keb->jml_apbd) }}
                                                        @elseif ($periode->sesi == 'final')
                                                            {{ str_replace('.', ',', $keb->jml_final) }}
                                                        @endif
                                                    </td>
                                                    <td class="p-0 m-0 fs-7 text-center align-middle">
                                                        @if ($keb->tipe_keb == 'ssh')
                                                            {{ $keb->ssh->satuan->satuan??'' }}
                                                        @elseif ($keb->tipe_keb == 'usulanssh')
                                                            {{ $keb->usulanssh->satuan->satuan??'' }}
                                                        @elseif ($keb->tipe_keb == 'sbu')
                                                            {{ $keb->sbu->satuan->satuan??'' }}
                                                        @elseif ($keb->tipe_keb == 'usulansbu')
                                                            {{ $keb->usulansbu->satuan->satuan??'' }}
                                                        @elseif ($keb->tipe_keb == 'other')
                                                            {{ $keb->satuan->satuan??'' }}
                                                        @endif
                                                    </td>
                                                    <td class="p-0 m-0 fs-7 text-end align-middle">
                                                        @if ($periode->sesi == 'rka')
                                                            {{ str_replace(',', '.', number_format($keb->harga_rka)) }}
                                                        @elseif ($periode->sesi == 'kuappas')
                                                            {{ str_replace(',', '.', number_format($keb->harga_kuappas)) }}
                                                        @elseif ($periode->sesi == 'apbd')
                                                            {{ str_replace(',', '.', number_format($keb->harga_apbd)) }}
                                                        @elseif ($periode->sesi == 'final')
                                                            {{ str_replace(',', '.', number_format($keb->harga_final)) }}
                                                        @endif
                                                    </td>
                                                    <td class="p-0 m-0 fs-7 text-end align-middle">
                                                        @if ($periode->sesi == 'rka')
                                                            {{ str_replace(',', '.', number_format($keb->total_rka)) }}
                                                        @elseif ($periode->sesi == 'kuappas')
                                                            {{ str_replace(',', '.', number_format($keb->total_kuappas)) }}
                                                        @elseif ($periode->sesi == 'apbd')
                                                            {{ str_replace(',', '.', number_format($keb->total_apbd)) }}
                                                        @elseif ($periode->sesi == 'final')
                                                            {{ str_replace(',', '.', number_format($keb->total_final)) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            
                            @else
                            
                                <div class="table-responsive col-lg-12 mt-3">
                                    
                                    <table class="table table-bordered border-dark table-sm" id="tblkak">
                                        <thead>
                                            <tr class="text-center fs-7 text-wrap">
                                                <th scope="col" rowspan="3" class="align-middle">No</th>
                                                <th scope="col" colspan="5">Kebutuhan Sumber Daya</th>
                                                <th scope="col" colspan="5">Kebutuhan Belanja</th>
                                                <th colspan="4" rowspan="2">Jan</th>
                                                <th colspan="4" rowspan="2">Feb</th>
                                                <th colspan="4" rowspan="2">Mar</th>
                                                <th colspan="4" rowspan="2">Apr</th>
                                                <th colspan="4" rowspan="2">Mei</th>
                                                <th colspan="4" rowspan="2">Jun</th>
                                                <th colspan="4" rowspan="2">Jul</th>
                                                <th colspan="4" rowspan="2">Agus</th>
                                                <th colspan="4" rowspan="2">Sep</th>
                                                <th colspan="4" rowspan="2">Okt</th>
                                                <th colspan="4" rowspan="2">Nov</th>
                                                <th colspan="4" rowspan="2">Des</th>
                                            </tr>
                                            <tr class="text-center fs-7 text-wrap">
                                                <th scope="col" class="w-15" colspan="2">Personil</th>
                                                <th scope="col" class="w-15" colspan="2">Alat</th>
                                                <th scope="col" class="w-10" rowspan="2" class="text-wrap align-middle">Data/ Dokumen</th>
                                                <th class="w-30" rowspan="2" class="align-middle">Uraian Kebutuhan</th>
                                                <th rowspan="2" class="align-middle">Vol</th>
                                                <th rowspan="2" class="align-middle">Satuan</th>
                                                <th rowspan="2" class="align-middle">Harga</th>
                                                <th rowspan="2" class="align-middle">Total</th>
                                            </tr>
                                            <tr class="text-center fs-7 text-wrap">
                                                <th class="p-0 m-0">Rincian</th>
                                                <th class="p-0 m-0">Qty</th>
                                                <th class="p-0 m-0">Rincian</th>
                                                <th class="p-0 m-0">Qty</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                                <th class="p-0 m-0">1</th>
                                                <th class="p-0 m-0">2</th>
                                                <th class="p-0 m-0">3</th>
                                                <th class="p-0 m-0">4</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr class="fs-7 bg-green">
                                                <th colspan="9" class="text-start">Total Anggaran</th>
                                                <th class="text-end" colspan="2">
                                                    @php
                                                    $total_kak = 0;
                                                    foreach ($kak->tahap as $thp) {
                                                        foreach($thp->aktivitas as $akt){
                                                        if($periode->sesi == 'rka'){
                                                            $total_kak += $akt->kebutuhanakt->sum('total_rka');
                                                        }else if($periode->sesi == 'kuappas'){
                                                            $total_kak += $akt->kebutuhanakt->sum('total_kuappas');
                                                        }else if($periode->sesi == 'apbd'){
                                                            $total_kak += $akt->kebutuhanakt->sum('total_apbd');
                                                        }else if($periode->sesi == 'final'){
                                                            $total_kak += $akt->kebutuhanakt->sum('total_final');
                                                        }
                                                        }
                                                    }
                                                    echo str_replace(',', '.', number_format($total_kak))
                                                    @endphp
                                                </th>
                                                <th colspan="48"></th>
                                            </tr>
                                            {{-- tahap --}}
                                            @foreach ($kak->tahap as $thp)
                                                <tr class="fs-7 bg-info">
                                                    <th class="text-center">{{ chr(64+$loop->iteration) }}</th>
                                                    <th colspan="8" class="text-start">{{ $thp->ket }}</th>
                                                    <th colspan="2" class="text-end">
                                                        @php
                                                            $total_tahap = 0;
                                                            foreach($thp->aktivitas as $akt){
                                                            if($periode->sesi == 'rka'){
                                                                $total_tahap += $akt->kebutuhanakt->sum('total_rka');
                                                            }else if($periode->sesi == 'kuappas'){
                                                                $total_tahap += $akt->kebutuhanakt->sum('total_kuappas');
                                                            }else if($periode->sesi == 'apbd'){
                                                                $total_tahap += $akt->kebutuhanakt->sum('total_apbd');
                                                            }else if($periode->sesi == 'final'){
                                                                $total_tahap += $akt->kebutuhanakt->sum('total_final');
                                                            }
                                                            }
                                                            echo str_replace(',', '.', number_format($total_tahap))
                                                        @endphp
                                                    </th>
                                                    <th colspan="48"></th>
                                                </tr>
                                                    {{-- aktivitas --}}
                                                    @foreach ($thp->aktivitas as $akt)

                                                        @php
                                                            $countakt = max($akt->personalakt->count(), $akt->instruakt->count(), $akt->dataakt->count(), $akt->kebutuhanakt->count());

                                                            $awalper = ((($akt->bulandari - 1) * 4) + $akt->minggudari);
                                                            $akhirper = ((($akt->bulansampai - 1) * 4) + $akt->minggusampai);

                                                            $sel = $akhirper - $awalper;
                                                            $selawal = $awalper - 1;
                                                            $selakhir = 48 - $akhirper;
                                                        @endphp

                                                        <tr class="fs-7 bg-orange">
                                                            <th class="text-center">{{ $loop->iteration }}</th>
                                                            <th colspan="8" class="text-start">{{ $akt->ket }}</th>
                                                            <th colspan="2" class="text-end">
                                                            @if ($periode->sesi == 'rka')
                                                                {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_rka'))) }}
                                                            @elseif ($periode->sesi == 'kuappas')
                                                                {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_kuappas'))) }}
                                                            @elseif ($periode->sesi == 'apbd')
                                                                {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_apbd'))) }}
                                                            @elseif ($periode->sesi == 'final')
                                                                {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_final'))) }}
                                                            @endif
                                                            </th>
                                                            
                                                            @for ($i = 1; $i <= 48; $i++)
                                                                <th @if($i >= $awalper && $i <= $akhirper) style="background-color:#0ff;" @else style="background-color:white;" @endif></th>
                                                            @endfor

                                                        </tr>

                                                        @for ($i = 0; $i < $countakt; $i++)
                                            
                                                            {{-- data aktivitas --}}
                                                            <tr class="fs-7 border-dark">
                                                                <td></td>
                                                                {{-- personalakt --}}
                                                                @if($i+1 > $akt->personalakt->count())
                                                                    <td></td>
                                                                    <td></td>
                                                                @else
                                                                    <td class="m-0 p-0 text-wrap">
                                                                        @if ($akt->personalakt[$i]->personil_slug != null)
                                                                        {{ $akt->personalakt[$i]->personil->name }} 
                                                                        @else
                                                                        {{ ucwords($akt->personalakt[$i]->otherpersonil) }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="m-0 p-0 text-center">
                                                                        {{ $akt->personalakt[$i]->jumlah }}
                                                                    </td>
                                                                @endif
                                                                {{-- end personalakt --}}
                                                    
                                                                {{-- instruakt --}}
                                                                @if($i+1 > $akt->instruakt->count())
                                                                    <td></td>
                                                                    <td></td>
                                                                @else
                                                                    <td class="m-0 p-0 text-wrap">
                                                                        @if ($akt->instruakt[$i]->instruakt_slug != null)
                                                                        {{ $akt->instruakt[$i]->instrumen->name??'' }}
                                                                        @else
                                                                        {{ ucwords($akt->instruakt[$i]->otherinstru) }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="m-0 p-0 text-center">
                                                                        {{ $akt->instruakt[$i]->jumlah }}
                                                                    </td>
                                                                @endif
                                                                {{-- instruakt --}}
                                                    
                                                                {{-- dataakt --}}
                                                                @if($i+1 > $akt->dataakt->count())
                                                                    <td></td>
                                                                @else
                                                                    <td class="text-wrap">
                                                                        @if ($akt->dataakt[$i]->datakeg_slug != null)
                                                                            {{ $akt->dataakt[$i]->datakeg->name }}
                                                                        @else
                                                                            {{ ucwords($akt->dataakt[$i]->otherdata) }}
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                                {{-- dataakt --}}
                                                    
                                                                {{-- kebutuhanakt --}}
                                                                @if($i+1 > $akt->kebutuhanakt->count())
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                @else
                                                                    <td class="w-30 p-0 m-0">
                                                                        @if ($akt->kebutuhanakt[$i]->tipe_keb == 'ssh')
                                                                            {{ $akt->kebutuhanakt[$i]->ssh->ket }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'usulanssh')
                                                                            {{ $akt->kebutuhanakt[$i]->usulanssh->ket }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'sbu')
                                                                            {{ $akt->kebutuhanakt[$i]->sbu->ket }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'usulansbu')
                                                                            {{ $akt->kebutuhanakt[$i]->usulansbu->ket }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'other')
                                                                            {{ $akt->kebutuhanakt[$i]->uraian_lain }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="p-0 m-0 text-center align-middle">
                                                                        @if ($periode->sesi == 'rka')
                                                                            {{ str_replace('.', ',', $akt->kebutuhanakt[$i]->jml_rka) }}
                                                                        @elseif ($periode->sesi == 'kuappas')
                                                                            {{ str_replace('.', ',', $akt->kebutuhanakt[$i]->jml_kuappas) }}
                                                                        @elseif ($periode->sesi == 'apbd')
                                                                            {{ str_replace('.', ',', $akt->kebutuhanakt[$i]->jml_apbd) }}
                                                                        @elseif ($periode->sesi == 'final')
                                                                            {{ str_replace('.', ',', $akt->kebutuhanakt[$i]->jml_final) }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="p-0 m-0 text-center align-middle">
                                                                        @if ($akt->kebutuhanakt[$i]->tipe_keb == 'ssh')
                                                                            {{ $akt->kebutuhanakt[$i]->ssh->satuan->satuan??'' }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'usulanssh')
                                                                            {{ $akt->kebutuhanakt[$i]->usulanssh->satuan->satuan??'' }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'sbu')
                                                                            {{ $akt->kebutuhanakt[$i]->sbu->satuan->satuan??'' }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'usulansbu')
                                                                            {{ $akt->kebutuhanakt[$i]->usulansbu->satuan->satuan??'' }}
                                                                        @elseif ($akt->kebutuhanakt[$i]->tipe_keb == 'other')
                                                                            {{ $akt->kebutuhanakt[$i]->satuan->satuan??'' }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="p-0 m-0 text-end align-middle">
                                                                        @if ($periode->sesi == 'rka')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->harga_rka)) }}
                                                                        @elseif ($periode->sesi == 'kuappas')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->harga_kuappas)) }}
                                                                        @elseif ($periode->sesi == 'apbd')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->harga_apbd)) }}
                                                                        @elseif ($periode->sesi == 'final')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->harga_final)) }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="p-0 m-0 text-end align-middle">
                                                                        @if ($periode->sesi == 'rka')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->total_rka)) }}
                                                                        @elseif ($periode->sesi == 'kuappas')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->total_kuappas)) }}
                                                                        @elseif ($periode->sesi == 'apbd')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->total_apbd)) }}
                                                                        @elseif ($periode->sesi == 'final')
                                                                            {{ str_replace(',', '.', number_format($akt->kebutuhanakt[$i]->total_final)) }}
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                                {{-- kebutuhanakt --}}

                                                                @if($countakt > 3)

                                                                    @if($selawal > 0)
                                                                        <td colspan="{{ $selawal }}"></td>
                                                                    @endif

                                                                        <td colspan="{{ $sel + 1 }}" style="background-color:#0ff;"></td>

                                                                    @if($selakhir > 0)
                                                                        <td colspan="{{ $selakhir }}"></td>
                                                                    @endif

                                                                @else

                                                                    @for ($i = 1; $i <= 48; $i++)
                                                                        <td @if($i >= $awalper && $i <= $akhirper) style="background-color:#0ff;" @endif></td>
                                                                    @endfor

                                                                @endif

                                                            </tr>
                                                            {{-- end data aktivitas --}}

                                                        @endfor

                                                    @endforeach
                                                    {{-- end aktivitas --}}
                                            @endforeach
                                            {{-- end tahap --}}
                                        </tbody>
                                    </table>
                                
                                    
                                </div>
                                
                                
                            @endif
                                <hr>
                        @endforeach

                        {{-- end kak --}}


                        <div class="page-break"></div>

                    @endif

                    {{-- end jml kak --}}

                @endif

                {{-- end pdf --}}

            @endforeach

        @endforeach

    </body>
</html>

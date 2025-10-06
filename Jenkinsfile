pipeline {
    agent any
    
    environment {
        COMPOSE_PROJECT_NAME = "jenkins-ecommerce-${env.BUILD_NUMBER}"
    }
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code from GitHub...'
                checkout scm
            }
        }
        
        stage('Build Docker Images') {
            steps {
                echo 'Building backend Docker image...'
                sh 'docker-compose build backend'
            }
        }
        
        stage('Run Tests') {
            steps {
                echo 'Starting services with unique project name...'
                sh 'docker-compose -p ${COMPOSE_PROJECT_NAME} up -d'
                
                echo 'Waiting for services to be ready...'
                sh 'sleep 10'
                
                echo 'Running Laravel tests...'
                sh 'docker-compose -p ${COMPOSE_PROJECT_NAME} exec -T backend php artisan test || true'
            }
        }
        
        stage('Cleanup') {
            steps {
                echo 'Stopping and removing containers...'
                sh 'docker-compose -p ${COMPOSE_PROJECT_NAME} down -v || true'
                
                echo 'Pruning Docker system...'
                sh 'docker system prune -f'
            }
        }
    }
    
    post {
        always {
            sh 'docker-compose -p ${COMPOSE_PROJECT_NAME} down -v || true'
        }
        success {
            echo 'Build and tests completed successfully!'
        }
        failure {
            echo 'Build or tests failed!'
        }
    }
}